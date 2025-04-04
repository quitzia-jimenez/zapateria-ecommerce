<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Surfsidemedia\Shoppingcart\Facades\Cart;

use Picqer\Barcode\BarcodeGeneratorPNG;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        // Verifica si el campo 'size' está presente en el Request
        if (!$request->has('size') || empty($request->size)) {
            return redirect()->back()->with('error', 'Por favor selecciona una talla antes de agregar al carrito.');
        }

        // Agrega el producto al carrito con la talla seleccionada
        Cart::instance('cart')->add(
            $request->id,
            $request->name,
            $request->quantity,
            $request->price,
            ['size' => $request->size] // Agregar la talla como una opción
        )->associate('App\Models\Product');

        return redirect()->back()->with('success', 'Producto agregado al carrito con éxito.');
    }

    public function increse_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function decrese_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function empty_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function aply_coupon_code(Request $request)
    {
        $coupon_code = $request->coupon_code;
        if (isset($coupon_code)) {
            $coupon = Coupon::where('code', $coupon_code)
                ->where('expiry_date', '>=', Carbon::today())
                ->where('cart_value', '<=', Cart::instance('cart')->subtotal())
                ->first();

            if (!$coupon) {
                return redirect()->back()->with('error', 'Cupon invalido');
            } else {
                Session::put('coupon', [
                    'code' => $coupon->code,
                    'type' => $coupon->type,
                    'value' => $coupon->value,
                    'cart_value' => $coupon->cart_value,
                ]);
                $this->calculateDiscount();
                return redirect()->back()->with('success', 'Cupon aplicado!');
            }
        } else {
            return redirect()->back()->with('error', 'Cupon invalido');
        }
    }

    public function calculateDiscount()
    {
        $discount = 0;
        if (Session::has('coupon')) {
            if (Session::get('coupon')['type'] == 'fixed') {
                $discount = Session::get('coupon')['value'];
            } else {
                $discount = (Cart::instance('cart')->subtotal() * Session::get('coupon')['value']) / 100;
            }
            $subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $discount;
            $taxAfterDiscount = ($subtotalAfterDiscount * config('cart.tax')) / 100;
            $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;

            Session::put('discounts', [
                'discount' => number_format(floatval($discount), 2, '.', ''),
                'subtotal' => number_format(floatval($subtotalAfterDiscount), 2, '.', ''),
                'tax' => number_format(floatval($taxAfterDiscount), 2, '.', ''),
                'total' => number_format(floatval($totalAfterDiscount), 2, '.', ''),
            ]);
        }
    }

    public function remove_coupon()
    {
        Session::forget('coupon');
        Session::forget('discounts');
        return back()->with('success', 'Cupon removido');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $address = Address::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();
        return view('checkout', compact('address'));
    }

    public function place_an_order(Request $request)
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->where('isdefault', true)->first();

        if (!$address) {
                $request->validate([
                    'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:100'], // Solo letras y espacios
                    'phone' => ['required', 'numeric', 'digits:10'], // Solo números y exactamente 10 dígitos
                ], [
                    'name.regex' => 'El nombre solo puede contener letras y espacios.',
                    'phone.numeric' => 'El número de teléfono solo puede contener números.',
                    'phone.digits' => 'El número de teléfono debe tener exactamente 10 dígitos.',
                ]);
            
                $address = new Address();
                $address->user_id = $user_id; // Asignar el user_id
                $address->name = $request->name;
                $address->phone = $request->phone;
                $address->isdefault = true;
                $address->save();
            }
        $this->setAmountforCheckout();

        $order = new Order();
        $order->user_id = $user_id;
        $subtotal = preg_replace('/[^\d.]/', '', Cart::instance('cart')->subtotal());
        $order->subtotal = number_format(round(floatval($subtotal), 2), 2, '.', '');

        $discount = Session::get('discounts')['discount'] ?? 0;
        $discount = preg_replace('/[^\d.]/', '', $discount); // Elimina caracteres no numéricos excepto el punto decimal
        $order->discount = number_format(round(floatval($discount), 2), 2, '.', '');

        $tax = Session::get('checkout')['tax'] ?? 0;
        $tax = preg_replace('/[^\d.]/', '', Cart::instance('cart')->tax());
        $order->tax = number_format(round(floatval($tax), 2), 2, '.', '');

        $total = Session::get('checkout')['total'] ?? 0;
        $total = preg_replace('/[^\d.]/', '', Cart::instance('cart')->total());
        $order->total = number_format(round(floatval($total), 2), 2, '.', '');
        $order->name = $address->name;
        $order->phone = $address->phone;
        do {
            $reference_code = strtoupper(substr(md5(uniqid($order->user_id . $order->subtotal . $order->total . $order->created_at, true)), 0, 10));
        } while (Order::where('reference_code', $reference_code)->exists());

        $order->reference_code = $reference_code;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($request->mode == "cod") {
            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->status = 'pendiente';
            $transaction->save();
        }

        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        Session::forget('coupon');
        Session::forget('discounts');
        Session::put('order_id', $order->id);
        return redirect()->route('cart.order.confirmation', compact('order'));
    }

    public function setAmountforCheckout()
    {
        if (!Cart::instance('cart')->content()->count() > 0) {
            Session::forget('checkout');
            return;
        }
        if (Session::has('coupon')) {
            Session::put('checkout', [
                'discount' => Session::get('discounts')['discount'],
                'subtotal' => Session::get('discounts')['subtotal'],
                'tax' => Session::get('discounts')['tax'],
                'total' => Session::get('discounts')['total'],
            ]);
        } else {
            Session::put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function order_confirmation()
    {
        if (Session::has('order_id')) {
            $order = Order::find(Session::get('order_id'));
            return view('order-confirmation', compact('order'));
        }
        return redirect()->route('cart.index');
    }

    public function uploadReceipt(Request $request, $order_id)
    {
        $request->validate([
            'receipt' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'receipt.required' => 'Debes adjuntar un comprobante de pago',
            'receipt.image' => 'El archivo debe ser una imagen',
            'receipt.mimes' => 'El formato debe ser JPG, PNG o JPEG',
            'receipt.max' => 'El tamaño máximo permitido es 2MB',
        ]);

        $order = Order::find($order_id);
        if (!$order || $order->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Orden no encontrada o no autorizada');
        }

        if ($request->hasFile('receipt')) {
            $file = $request->file('receipt');

            $fileName = 'receipt_' . $order_id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('receipts', $fileName, 'public');
            $order->image_proof = $path;
            $order->save();
            $transaction = Transaction::where('order_id', $order_id)->first();
            if ($transaction && $transaction->status == 'pendiente') {
                $transaction->status = 'en_comprobacion';
                $transaction->save();
            }

            return redirect('/catalogo')->with('success', 'Comprobante de pago subido correctamente');
        }

        return redirect()->back()->with('error', 'Error al subir el comprobante de pago');
    }

    public function generatePDF($orderId)
    {
        $order = Order::with(['orderItems.product', 'transaction'])->findOrFail($orderId);

        $barcodeGenerator = new BarcodeGeneratorPNG();
        $barcode = $barcodeGenerator->getBarcode(
            $order->reference_code, 
            $barcodeGenerator::TYPE_CODE_128,
            3,  
            60  
        );

        $barcodeBase64 = 'data:image/png;base64,' . base64_encode($barcode);
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents('https://bomu-shop.com/recursos/user/img/bomu-logo.png'));

        $pdf = Pdf::loadView('pdfs.order-receipt', [
            'order' => $order,
            'barcodeBase64' => $barcodeBase64,
            'logoBase64' => $logoBase64
        ]);

        return $pdf->download("orden-{$order->id}.pdf");
    }
}
