<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $sizep = $request->query('sizep') ? $request->query('sizep') : 12;
        $o_column = "";
        $o_order = "";
        $order = $request->query('order') ? $request->query('order') : -1;
        $f_categories = $request->query('categories');
        $min_price = $request->query('min') ? $request->query('min') : 1;
        $max_price = $request->query('max') ? $request->query('max') : 3000;
        $f_size = $request->query('size'); // Obtener la talla seleccionada

        switch ($order) {
            case 1:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
            case 2:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
            case 3:
                $o_column = "sale_price";
                $o_order = "ASC";
                break;
            case 4:
                $o_column = "sale_price";
                $o_order = "DESC";
                break;
            default:
                $o_column = "id";
                $o_order = "DESC";
                break;
        }
        $categories = Category::orderBy('name','ASC')->get();
        $sizes = Size::orderBy('size', 'ASC')->get(); // Cargar todas las tallas

        $products = Product::where(function($query) use($f_categories){
            $query->whereIn('category_id',explode(",",$f_categories))->orWhereRaw("'".$f_categories."' = ''");
        })
        ->where(function($query) use($min_price,$max_price){
            $query->whereBetween('regular_price',[$min_price,$max_price])
                  ->orWhereBetween('sale_price',[$min_price,$max_price]);
        })
        ->when($f_size, function ($query, $f_size) {
            return $query->whereHas('sizes', function ($q) use ($f_size) {
                $q->where('size', $f_size);
            });
        })

        ->orderBy($o_column,$o_order)->paginate($sizep);
        return view('catalogo', compact('products','sizep', 'order', 'categories','f_categories','min_price','max_price',  'sizes', 'f_size'));
    }

    public function product_details($product_slug)
    {
        $product = Product :: where('slug', $product_slug)->first();
        $rproducts = Product::where('slug','<>',$product_slug)->get()->take(8);
        return view('details',compact('product', 'rproducts'));

    }
}
