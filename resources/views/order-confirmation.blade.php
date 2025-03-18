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
      Orden recibida</h2>

    <!-- Checkout Steps - Modernized -->
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
          style="background-color: #d769a3; color: white; width: 35px; height: 35px; border-radius: 50%; font-weight: 600;">02</span>
        <span class="checkout-steps__item-title">
          <span style="color: #434343; font-weight: 600; font-size: 14px;">Envío y pago</span>
          <em style="display: block; font-size: 12px; color: #6c757d; font-style: normal;">Consulta tu Lista de
            Artículos</em>
        </span>
      </a>
      <a href="javascript:void(0)" class="checkout-steps__item d-flex align-items-center text-decoration-none">
        <span class="checkout-steps__item-number d-flex align-items-center justify-content-center me-3"
          style="background-color: #d769a3; color: white; width: 35px; height: 35px; border-radius: 50%; font-weight: 600; border: 1px solid #dee2e6;">03</span>
        <span class="checkout-steps__item-title">
          <span style="color: #6c757d; font-weight: 600; font-size: 14px;">Confirmación</span>
          <em style="display: block; font-size: 12px; color: #6c757d; font-style: normal;">Revise y Envíe Su Pedido</em>
        </span>
      </a>
    </div>

    <div class="order-complete" style="display: flex; flex-direction: column; gap: 2rem;">
      <div class="order-complete__message"
        style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 2rem; text-align: center;">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"
          style="margin: 0 auto 1.5rem;">
          <circle cx="40" cy="40" r="40" fill="#d769a3" />
          <path
            d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z"
            fill="white" />
        </svg>
        <h3 style="font-weight: 700; margin-bottom: 1rem; color: #434343; font-size: 1.75rem;">¡Tu orden ha sido
          completada!</h3>
        <p style="color: #7a7a7a; font-size: 1.1rem;">Gracias. Tu orden ha sido recibida</p>
      </div>

      <div class="order-info"
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
        <div class="order-info__item"
          style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 1.5rem; text-align: center;">
          <label
            style="display: block; font-weight: 500; color: #7a7a7a; margin-bottom: 0.5rem; font-size: 0.9rem;">Número
            de orden</label>
          <span style="display: block; font-weight: 700; color: #434343; font-size: 1.1rem;">{{$order->id}}</span>
        </div>
        <div class="order-info__item"
          style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 1.5rem; text-align: center;">
          <label
            style="display: block; font-weight: 500; color: #7a7a7a; margin-bottom: 0.5rem; font-size: 0.9rem;">Fecha</label>
          <span
            style="display: block; font-weight: 700; color: #434343; font-size: 1.1rem;">{{$order->created_at}}</span>
        </div>
        <div class="order-info__item"
          style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 1.5rem; text-align: center;">
          <label
            style="display: block; font-weight: 500; color: #7a7a7a; margin-bottom: 0.5rem; font-size: 0.9rem;">Total</label>
          <span style="display: block; font-weight: 700; color: #d769a3; font-size: 1.1rem;">${{$order->total}}</span>
        </div>
        <div class="order-info__item"
          style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 1.5rem; text-align: center;">
          <label
            style="display: block; font-weight: 500; color: #7a7a7a; margin-bottom: 0.5rem; font-size: 0.9rem;">Método
            de pago</label>
          <span
            style="display: block; font-weight: 700; color: #434343; font-size: 1.1rem;">{{$order->transaction->mode}}</span>
        </div>
      </div>

      <div class="checkout__totals-wrapper">
        <div class="checkout__totals"
          style="background-color: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 1.5rem;">
          <h3
            style="font-weight: 700; margin-bottom: 1.5rem; color: #434343; position: relative; padding-bottom: 0.75rem; border-bottom: 2px solid #eee;">
            Detalles de orden</h3>
          <table class="checkout-cart-items" style="width: 100%; margin-bottom: 1.5rem; border-collapse: collapse;">
            <thead>
              <tr style="background-color: #f8f9fa;">
                <th
                  style="padding: 1rem; text-align: left; font-weight: 600; color: #434343; border-bottom: 1px solid #eee;">
                  PRODUCTO</th>
                <th
                  style="padding: 1rem; text-align: right; font-weight: 600; color: #434343; border-bottom: 1px solid #eee;">
                  SUBTOTAL</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->orderItems as $item)
          <tr>
          <td style="padding: 1rem; border-bottom: 1px solid #eee; color: #434343;">
            {{$item->product->name}} x {{$item->quantity}}
          </td>
          <td
            style="padding: 1rem; text-align: right; font-weight: 600; border-bottom: 1px solid #eee; color: #434343;">
            ${{$item->price}}
          </td>
          </tr>
        @endforeach
            </tbody>
          </table>

          <table class="checkout-totals" style="width: 100%; margin-top: 1.5rem;">
            <tbody>
              <tr>
                <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">SUBTOTAL</th>
                <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #434343;">
                  ${{$order->subtotal}}</td>
              </tr>
              <tr>
                <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">DESCUENTO</th>
                <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #dc3545;">
                  ${{$order->discount}}</td>
              </tr>
              <tr>
                <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">Envío</th>
                <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #28a745;">Envío gratis</td>
              </tr>
              <tr>
                <th style="padding: 0.75rem 0; text-align: left; font-weight: 500; color: #7a7a7a;">I.V.A.</th>
                <td style="padding: 0.75rem 0; text-align: right; font-weight: 600; color: #434343;">${{$order->tax}}
                </td>
              </tr>
              <tr style="border-top: 2px solid #eee;">
                <th style="padding: 1rem 0; text-align: left; font-weight: 700; color: #434343; font-size: 1.15rem;">
                  TOTAL</th>
                <td style="padding: 1rem 0; text-align: right; font-weight: 700; color: #d769a3; font-size: 1.15rem;">
                  ${{$order->total}}</td>
              </tr>
            </tbody>
          </table>

          <div style="margin-top: 2rem; text-align: center;">
            <a href="{{route('shop.index')}}" class="btn btn-primary"
              style="display: inline-block; padding: 0.75rem 2rem; border-radius: 8px; background-color: #d769a3; color: white; text-align: center; font-weight: 600; text-decoration: none; border: none; box-shadow: 0 4px 10px rgba(215, 105, 164, 0.3); transition: all 0.3s ease;">Seguir
              Comprando</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endSection