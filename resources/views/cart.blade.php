@extends('layouts.app')
@section('css')
  <link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

  <link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/indexcss.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/swiper.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/custom.css')}}">
@endsection

@section('content')

<main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container" style="padding: 2rem 0;">
    <h2 class="page-title"
      style="font-weight: 700; margin-bottom: 2rem; color: #434343; position: relative; padding-bottom: 0.75rem; border-bottom: 3px solid #d769a3; width: fit-content;">
      Tu Carrito</h2>

    <div class="checkout-steps d-flex justify-content-between mb-5 px-4 py-3"
      style="background-color: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
      <a href="{{route('cart.index')}}"
        class="checkout-steps__item active d-flex align-items-center text-decoration-none">
        <span class="checkout-steps__item-number d-flex align-items-center justify-content-center me-3"
          style="background-color: #d769a3; color: white; width: 35px; height: 35px; border-radius: 50%; font-weight: 600;">01</span>
        <span class="checkout-steps__item-title">
          <span style="color: #434343; font-weight: 600; font-size: 14px;">Comprar carrito</span>
          <em style="display: block; font-size: 12px; color: #6c757d; font-style: normal;">Lista de carrito</em>
        </span>
      </a>
      <a href="javascript:void(0)" class="checkout-steps__item active d-flex align-items-center text-decoration-none">
        <span class="checkout-steps__item-number d-flex align-items-center justify-content-center me-3"
          style="background-color: #f8f9fa; color: #6c757d; width: 35px; height: 35px; border-radius: 50%; font-weight: 600;">02</span>
        <span class="checkout-steps__item-title">
          <span style="color: #434343; font-weight: 600; font-size: 14px;">Envío y Pago</span>
          <em style="display: block; font-size: 12px; color: #6c757d; font-style: normal;">Consulta tu Lista de
            Artículos</em>
        </span>
      </a>
      <a href="javascript:void(0)" class="checkout-steps__item d-flex align-items-center text-decoration-none">
        <span class="checkout-steps__item-number d-flex align-items-center justify-content-center me-3"
          style="background-color: #f8f9fa; color: #6c757d; width: 35px; height: 35px; border-radius: 50%; font-weight: 600; border: 1px solid #dee2e6;">03</span>
        <span class="checkout-steps__item-title">
          <span style="color: #6c757d; font-weight: 600; font-size: 14px;">Confirmación</span>
          <em style="display: block; font-size: 12px; color: #6c757d; font-style: normal;">Revise y Envíe Su Pedido</em>
        </span>
      </a>
    </div>


    <div class="shopping-cart"
      style="display: grid; grid-template-columns: 1fr; gap: 2rem; margin-bottom: 2rem; @media (min-width: 992px) { grid-template-columns: 2fr 1fr; }">
      @if($items->count() > 0)
      <div class="cart-table__wrapper"
      style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden;">
      <table class="cart-table" style="width: 100%; border-collapse: separate; border-spacing: 0; margin-bottom: 0;">
        <thead>
        <tr style="background-color: #f8f9fa;">
          <th
          style="padding: 1.25rem 1rem; font-weight: 600; color: #434343; text-align: left; border-bottom: 1px solid #eee;">
          Producto</th>
          <th
          style="padding: 1.25rem 1rem; font-weight: 600; color: #434343; text-align: left; border-bottom: 1px solid #eee;">
          </th>
          <th
          style="padding: 1.25rem 1rem; font-weight: 600; color: #434343; text-align: left; border-bottom: 1px solid #eee;">
          Precio</th>
          <th
          style="padding: 1.25rem 1rem; font-weight: 600; color: #434343; text-align: left; border-bottom: 1px solid #eee;">
          Cantidad</th>
          <th
          style="padding: 1.25rem 1rem; font-weight: 600; color: #434343; text-align: left; border-bottom: 1px solid #eee;">
          Subtotal</th>
          <th
          style="padding: 1.25rem 1rem; font-weight: 600; color: #434343; text-align: left; border-bottom: 1px solid #eee;">
          </th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
      <tr>
        <td style="padding: 1rem; vertical-align: middle; border-bottom: 1px solid #eee;">
        <div class="shopping-cart__product-item"
        style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa; border-radius: 8px; overflow: hidden;">
        <img loading="lazy" src="{{asset('uploads/products/thumbnails')}}/{{$item->model->image}}" width="100"
        height="100" alt="{{$item->name}}"
        style="max-width: 100%; max-height: 100%; object-fit: contain;" />
        </div>
        </td>
        <td style="padding: 1rem; vertical-align: middle; border-bottom: 1px solid #eee;">
        <div class="shopping-cart__product-item__detail">
        <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; color: #434343;">{{$item->name}}
        </h4>
        <ul class="shopping-cart__product-item__options"
        style="list-style: none; padding: 0; margin: 0; font-size: 0.85rem; color: #7a7a7a;">
        <li>Color: Yellow</li>
        <li>Size: L</li>
        </ul>
        </div>
        </td>
        <td style="padding: 1rem; vertical-align: middle; border-bottom: 1px solid #eee;">
        <span class="shopping-cart__product-price"
        style="font-weight: 600; color: #434343;">{{$item->price}}</span>
        </td>
        <td style="padding: 1rem; vertical-align: middle; border-bottom: 1px solid #eee;">
        <div class="qty-control position-relative"
        style="display: flex; align-items: center; max-width: 120px; border: 1px solid #eee; border-radius: 8px; overflow: hidden;">
        <input type="number" name="quantity" value="{{$item->qty}}" min="1"
        class="qty-control__number text-center"
        style="width: 40px; border: none; text-align: center; font-weight: 600; color: #434343;">

        <form action="{{route('cart.qty.decrese', ['rowId' => $item->rowId])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="qty-control__reduce"
          style="width: 32px; height: 32px; border: none; background-color: #f8f9fa; color: #434343; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">-</button>
        </form>

        <form action="{{route('cart.qty.increse', ['rowId' => $item->rowId])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="qty-control__increase"
          style="width: 32px; height: 32px; border: none; background-color: #f8f9fa; color: #434343; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">+</button>
        </form>
        </div>
        </td>
        <td style="padding: 1rem; vertical-align: middle; border-bottom: 1px solid #eee;">
        <span class="shopping-cart__subtotal"
        style="font-weight: 600; color: #d769a3;">${{$item->subTotal()}}</span>
        </td>
        <td style="padding: 1rem; vertical-align: middle; border-bottom: 1px solid #eee;">
        <form action="{{route('cart.item.remove', ['rowId' => $item->rowId])}}" method="POST">
        @csrf
        @method('DELETE')
        <a href="javascript:void(0)" class="remove-cart">
        <button type="submit"
          style="width: 32px; height: 32px; border: none; background-color: #f8f9fa; color: #d769a3; border-radius: 50%; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-times"></i>
        </button>
        </a>
        </form>
        </td>
      </tr>
    @endforeach
        </tbody>
      </table>

      <div class="cart-table-footer" style="display: flex; justify-content: space-between; padding: 1.5rem; background-color: #f8f9fa; flex-wrap: wrap; gap: 1rem;">
          @if(!Session::has('coupon'))
          <form action="{{route('cart.coupon.apply')}}" method="POST" class="position-relative bg-body"
              style="flex: 1; min-width: 250px;">
              @csrf
              <input class="form-control" type="text" name="coupon_code" placeholder="Código de Cupón" value=""
                  style="height: 48px; border: 1px solid #eee; border-radius: 8px; padding-right: 120px;">
              <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit" value="Aplicar cupón"
                  style="background: none; border: none; color: #d769a3; font-weight: 500; cursor: pointer; height: 100%; right: 0; top: 0;">
          </form>
          @else
          <form action="{{route('cart.coupon.remove')}}" method="POST" class="position-relative bg-body"
              style="flex: 1; min-width: 250px;">
              @csrf
              @method('DELETE')
              <input class="form-control" type="text" name="coupon_code" placeholder="Código de Cupón"
                  value="@if(Session::has('coupon')){{Session::get('coupon')['code']}} Aplicado! @endif"
                  style="height: 48px; border: 1px solid #eee; border-radius: 8px; padding-right: 120px;">
              <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit" value="Borrar Cupón"
                  style="background: none; border: none; color: #d769a3; font-weight: 500; cursor: pointer; height: 100%; right: 0; top: 0;">
          </form>
          @endif
      </div>

        <form action="{{route('cart.empty')}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-light"
          style="height: 48px; border-radius: 8px; background-color: #f1f1f1; color: #434343; border: none; font-weight: 500; padding: 0 1.5rem; transition: all 0.3s ease;">Limpiar
          Carrito</button>
        </form>
      </div>

      <div style="padding: 0 1.5rem 1.5rem; background-color: #f8f9fa;">
        @if(Session::has('success'))
      <p class="text-success" style="margin-bottom: 0; color: #28a745; font-weight: 500;">
      {{Session::get('success')}}
      </p>
    @elseif(Session::has('error'))
    <p class="text-danger" style="margin-bottom: 0; color: #dc3545; font-weight: 500;">{{Session::get('error')}}
    </p>
  @endif
      </div>
      </div>

      <div class="shopping-cart__totals-wrapper" style="position: relative;">
      <div class="sticky-content" style="position: sticky; top: 20px;">
        <div class="shopping-cart__totals"
        style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 1.5rem;">
        <h3
          style="font-weight: 700; margin-bottom: 1.5rem; color: #434343; position: relative; padding-bottom: 0.75rem; border-bottom: 2px solid #eee;">
          Resumen de compra</h3>
        @if(Session::has('discounts'))
      <table class="cart-totals" style="width: 100%; margin-bottom: 1.5rem;">
        <tbody>
        <tr>
        <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">Subtotal</th>
        <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #434343;">
        ${{Cart::instance('cart')->subtotal()}}</td>
        </tr>
        <tr>
        <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">Descuento
        {{Session::get('coupon')['code']}}
        </th>
        <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #dc3545;">
        -${{Session::get('discounts')['discount']}}</td>
        </tr>
        <tr>
        <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">Subtotal despues
        del descuento </th>
        <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #434343;">
        ${{Session::get('discounts')['subtotal']}}</td>
        </tr>
        <tr>
        <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">Envío</th>
        <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #28a745;">
        Gratis
        </td>
        </tr>
        <tr>
        <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">IVA</th>
        <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #434343;">
        ${{Session::get('discounts')['tax']}}</td>
        </tr>
        <tr style="border-top: 2px solid #eee;">
        <th style="padding: 1rem 0; text-align: left; font-weight: 700; color: #434343; font-size: 1.15rem;">
        Total</th>
        <td style="padding: 1rem 0; text-align: right; font-weight: 700; color: #d769a3; font-size: 1.15rem;">
        ${{Session::get('discounts')['total']}}</td>
        </tr>
        </tbody>
      </table>

    @else
    <table class="cart-totals" style="width: 100%; margin-bottom: 1.5rem;">
      <tbody>
      <tr>
      <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">Subtotal</th>
      <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #434343;">
      ${{Cart::instance('cart')->subtotal()}}</td>
      </tr>
      <tr>
      <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">Envío</th>
      <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #28a745;">
      Gratis
      </td>
      </tr>
      <tr>
      <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">IVA</th>
      <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #434343;">
      ${{Cart::instance('cart')->tax()}}</td>
      </tr>
      <tr style="border-top: 2px solid #eee;">
      <th style="padding: 1rem 0; text-align: left; font-weight: 700; color: #434343; font-size: 1.15rem;">
      Total</th>
      <td style="padding: 1rem 0; text-align: right; font-weight: 700; color: #d769a3; font-size: 1.15rem;">
      ${{Cart::instance('cart')->total()}}</td>
      </tr>
      </tbody>
    </table>
  @endif
        </div>
        <div class="mobile_fixed-btn_wrapper" style="margin-top: 1.5rem;">
        <div class="button-wrapper">
          <a href="{{route('cart.checkout')}}" class="btn btn-primary btn-checkout"
          style="display: block; width: 100%; padding: 1rem; border-radius: 8px; background-color: #d769a3; color: white; text-align: center; font-weight: 600; text-decoration: none; border: none; box-shadow: 0 4px 10px rgba(215, 105, 164, 0.3); transition: all 0.3s ease;">FINALIZAR
          COMPRA</a>
        </div>
        </div>
      </div>
      </div>
    @else
      <div class="col-md-12 text-center pt-5 bp-5"
      style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 4rem 2rem;">
      <div class="text-center mb-4">
        <i class="fas fa-shopping-cart" style="font-size: 80px; color: #eaeaea; margin-bottom: 2rem;"></i>
      </div>
      <h2 class="text-center" style="font-weight: 600; color: #434343; margin-bottom: 1.5rem;">Tu carrito está vacío
      </h2>
      <p style="color: #7a7a7a; margin-bottom: 2rem;">No tienes productos en tu carrito. ¡Empieza a comprar ahora!</p>
      <a href="{{route('shop.index')}}" class="btn btn-primary"
        style="padding: 0.75rem 2rem; border-radius: 8px; background-color: #d769a3; color: white; text-align: center; font-weight: 600; text-decoration: none; border: none; box-shadow: 0 4px 10px rgba(215, 105, 164, 0.3); transition: all 0.3s ease;">¡Compra
        Ahora!</a>
      </div>
    @endif
    </div>
  </section>
</main>

@endSection

@push('scripts')
  <script>
    $(function () {
    $(".qty-control__increase").on('click', function () {
      $(this).closest('form').submit();
    });
    $(".qty-control__reduce").on('click', function () {
      $(this).closest('form').submit();
    });
    $(".remove-cart").on('click', function () {
      $(this).closest('form').submit();
    });
    })
  </script>
@endpush