<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Product;
use App\Models\Size;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get()->take(5);  
        $dashboardDatas = DB::select("select sum(total) As TotalAmount,
                                sum(if(status='ordenado',total,0)) As TotalOrderedAmount,
                                sum(if(status='enviado',total,0)) As TotalDeliveredAmount,
                                sum(if(status='cancelado',total,0)) As TotalCanceledAmount,
                                Count(*) As Total,
                                sum(if(status='ordenado',1,0)) As TotalOrdered,
                                sum(if(status='enviado',1,0)) As TotalDelivered,
                                sum(if(status='cancelado',1,0)) As TotalCanceled
                                From orders       
                                ");
        return view ('admin.index',compact('orders','dashboardDatas'));
    }


    public function categories()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.categories', compact('categories'));
    }

    public function categories_add()
    {
        return view('admin.category-add');
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:jpg,png,jpeg|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $image = $request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp.'.'.$file_extension;
        $this->GenerateCategoryThumbailsImage($image, $file_name);
        $category->image = $file_name;
        $category->save();

        return redirect()->route('admin.categories')->with('status', 'La categoria se creo con exito!');
    }

    public function GenerateCategoryThumbailsImage($image, $imageName)
    {
        $destinationPath = public_path('uploads/categories');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
    }

    public function category_edit($id)
    {
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }

    
    public function category_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'. $request->id,
            'image' => 'mimes:jpg,png,jpeg|max:2048'
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if($request->hasFile('image')){
            if(File::exists(public_path('uptloads/categories/').'/'.$category->image))
            {
                File::delete(public_path('uploads/categories/').'/'.$category->image);
            }  
            $image = $request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp.'.'.$file_extension;
            $this->GenerateCategoryThumbailsImage($image, $file_name);
            $category->image = $file_name;
        }
        
        $category->save();

        return redirect()->route('admin.categories')->with('status', 'La categoria se actualizo con exito!');

    }

    public function category_delete($id)
    {
        $category = Category::find($id);
        if(File::exists(public_path('uptloads/categories/').'/'.$category->image))
            {
                File::delete(public_path('uploads/categories/').'/'.$category->image);
            }
        $category->delete();
        return redirect()->route('admin.categories')->with('status', 'La categoria se elimino con exito!');
            
    }

    public function products()
    {
        $products = Product::with('sizes')->get();
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        foreach ($products as $product) {
            $product->total_quantity = $product->sizes->sum('pivot.quantity');
        }
        return view('admin.products', compact('products'));
    }

    public function product_add()
    {
        $categories = Category::select('id','name')->orderBy('name')->get();
        $sizes = Size::all();
        return view('admin.product-add', compact('categories', 'sizes'));
    }

    public function product_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            //'sale_price' => 'required|numeric',
            'discount_percentage' => 'nullable|numeric|min:0|max:100', // Validar el porcentaje de descuento
            'SKU' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required',
            'sizes' => 'required|array|min:1', // Validar que las tallas sean un array no vacío
            'quantities' => 'required|array|min:1', // Validar que las cantidades sean un array no vacío
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
                // Calcular el precio con descuento
        $discountPercentage = $request->input('discount_percentage', 0);
        $product->discount_percentage = $discountPercentage;
        $product->sale_price = $product->regular_price - ($product->regular_price * ($discountPercentage / 100));
        $product->SKU = $request->SKU;
        $product->category_id = $request->category_id;

        $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $current_timestamp.'.'.$image->extension();
            $this->GenerateProductThumbnailImage($image, $imageName);
            $product->image = $imageName;
        }

        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;
        if($request->hasFile('images'))
        {
            $allowedfileExtion = ['jpg','png','jpeg'];
            $files = $request->file('images');
            foreach($files as $file)
            {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension,$allowedfileExtion);
                if($gcheck)
                {
                    $gfileName = $current_timestamp.'_'.$counter .'.'. $gextension;
                    $this->GenerateProductThumbnailImage($file, $gfileName);
                    array_push($gallery_arr, $gfileName);
                    $counter = $counter + 1;

                }
            }
            $gallery_images = implode(',',$gallery_arr);

        }
        $product->images = $gallery_images;
        $product->save();

        $sizes = $request->sizes;
        $quantities = $request->quantities;
        $sizeQuantities = [];

        foreach ($sizes as $sizeId) {
            if (!isset($quantities[$sizeId]) || $quantities[$sizeId] < 1) {
                return redirect()->back()->withErrors(['quantities' => 'Cada talla seleccionada debe tener una cantidad válida.']);
            }
            $sizeQuantities[$sizeId] = ['quantity' => $quantities[$sizeId]];
        }

        // Sincroniza las tallas y cantidades con el producto
        $product->sizes()->sync($sizeQuantities);

        return redirect()->route('admin.products')->with('status', 'El producto se creo con exito!');
    }   
    public function GenerateProductThumbnailImage($image, $imageName)
    {
        $destinationPathThumbnail = public_path('uploads/products/thumbnails');
        $destinationPath = public_path('uploads/products');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        $img->resize(104,104, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);
    }
    public function product_edit($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $sizes = Size::all(); // Cargar todas las tallas
        $productSizes = $product->sizes->pluck('pivot.quantity', 'id')->toArray(); // Obtener las tallas seleccionadas con sus cantidades
        return view('admin.product-edit', compact('product', 'categories', 'sizes', 'productSizes'));
    }

    public function product_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $request->id,
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'discount_percentage' => 'nullable|numeric|min:0|max:100', // Validar el porcentaje de descuento
            'SKU' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required',
            'sizes' => 'required|array', // Validar que las tallas sean un array
            'quantities' => 'required|array', // Validar que las cantidades sean un array
        ]);

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;

        // Calcular el precio con descuento
        $discountPercentage = $request->input('discount_percentage', 0);
        $product->discount_percentage = $discountPercentage;
        $product->sale_price = $product->regular_price - ($product->regular_price * ($discountPercentage / 100));

        $product->SKU = $request->SKU;
        $product->category_id = $request->category_id;

        $current_timestamp = Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/products') . '/' . $product->image)) {
                File::delete(public_path('uploads/products') . '/' . $product->image);
            }
            if (File::exists(public_path('uploads/products/thumbnails') . '/' . $product->image)) {
                File::delete(public_path('uploads/products/thumbnails') . '/' . $product->image);
            }
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenerateProductThumbnailImage($image, $imageName);
            $product->image = $imageName;
        }

        $gallery_arr = [];
        $gallery_images = "";
        $counter = 1;

        if ($request->hasFile('images')) {
            foreach (explode(',', $product->images) as $ofile) {
                if (File::exists(public_path('uploads/products') . '/' . $ofile)) {
                    File::delete(public_path('uploads/products') . '/' . $ofile);
                }
                if (File::exists(public_path('uploads/products/thumbnails') . '/' . $ofile)) {
                    File::delete(public_path('uploads/products/thumbnails') . '/' . $ofile);
                }
            }

            $allowedfileExtion = ['jpg', 'png', 'jpeg'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowedfileExtion);
                if ($gcheck) {
                    $gfileName = $current_timestamp . '_' . $counter . '.' . $gextension;
                    $this->GenerateProductThumbnailImage($file, $gfileName);
                    array_push($gallery_arr, $gfileName);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
            $product->images = $gallery_images;
        }

        $product->save();

        // Actualizar las tallas seleccionadas con sus cantidades
        $sizes = $request->sizes;
        $quantities = $request->quantities;
        $sizeQuantities = [];
        foreach ($sizes as $sizeId) {
            $sizeQuantities[$sizeId] = ['quantity' => $quantities[$sizeId]];
        }
        $product->sizes()->sync($sizeQuantities);

        return redirect()->route('admin.products')->with('status', 'El producto ha sido editado con éxito!');
    }
    
    
    public function product_delete($id)
    {
        $product = Product::find($id);
        if(File::exists(public_path('uploads/products').'/'.$product->image))
        {
            File::delete(public_path('uploads/products').'/'.$product->image);
        }
        if(File::exists(public_path('uploads/products/thumbnails').'/'.$product->image))
        {
            File::delete(public_path('uploads/products/thumbnails').'/'.$product->image);
        }
        foreach(explode(',',$product->images) as $ofile)
        {
            if(File::exists(public_path('uploads/products').'/'.$ofile))
            {
                File::delete(public_path('uploads/products').'/'.$ofile);
            }
            if(File::exists(public_path('uploads/products/thumbnails').'/'.$ofile))
            {
                File::delete(public_path('uploads/products/thumbnails').'/'.$ofile);
            }
        }
        $product->delete();
        return redirect()->route('admin.products')->with('status', 'El producto se elimino con exito!');
    }

    public function coupons()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->paginate(12);
        return view ('admin.coupons', compact('coupons'));
    }

    public function coupon_add()
    {
        return view('admin.coupon-add');
    }
    public function coupon_store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();

        return redirect()->route('admin.coupons')->with('status', 'El cupon se creo con exito!');
    }

    public function coupon_edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon-edit', compact('coupon'));
    }

    public function coupon_update(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);

        $coupon = Coupon::find($request->id);
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();

        return redirect()->route('admin.coupons')->with('status', 'El cupon se actualizo con exito!');
    }

    public function coupon_delete($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->route('admin.coupons')->with('status', 'El cupon se elimino con exito!');
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.orders', compact('orders'));
    }

    public function order_details($order_id)
    {
        $order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(12);
        $transaction = Transaction::where('order_id', $order_id)->first();
        return view('admin.order-details', compact('order','orderItems','transaction'));
    }

    public function update_order_status(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->order_status;
        if($request->order_status == 'enviado')
        {
            $order->delivered_date = Carbon::now();
        }
        else if($request->order_status == 'cancelado')
        {
            $order->canceled_date = Carbon::now();
        }
       
        $order->save();
        if($request->order_status == 'enviado')
        {
            $transaction = Transaction::where('order_id', $request->order_id)->first();
            $transaction->status = 'completada';
            $transaction->save();
        }
        return redirect()->back()->with('status', 'El estado del pedido se actualizo con exito!');
    }


    public function users()
    {
        $users = User::orderBy('id', 'DESC')->paginate(12);
        return view('admin.users', compact('users'));
    }

    public function user_edit($id)
    {
        $user = User::find($id);
        return view('admin.user-edit',compact('user'));
    }

    public function user_update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mobile' => 'required|string|max:15',
            'untype' => 'required|string',
            'old_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->untype = $request->untype;
    
        if ($request->filled('old_password') && $request->filled('new_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                return redirect()->back()->withErrors(['old_password' => 'La contraseña antigua no es correcta']);
            }
        }
    
        $user->save();
    
        return redirect()->route('admin.users')->with('status', 'El usuario ha sido actualizado con éxito');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name', 'like', "%{$query}%")->get()->take(8);
        return response()->json($results);
    }

    



}


