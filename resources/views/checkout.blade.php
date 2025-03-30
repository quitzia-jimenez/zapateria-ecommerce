@extends('layouts.app')
@section('css')
@endsection

@section('content')
<main class="pt-90" style="background-color: #f8f9fa;">
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container">
    <h2 class="page-title"
      style="font-weight: 700; margin-bottom: 2rem; color: #434343; position: relative; padding-bottom: 0.75rem; border-bottom: 3px solid #d769a3; width: fit-content;">
      Envío y pago</h2>

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
          <span style="color: #434343; font-weight: 600; font-size: 14px;">Confirmar y apartar</span>
          <em style="display: block; font-size: 12px; color: #6c757d; font-style: normal;">Consulta tu Lista de
            Artículos</em>
        </span>
      </a>
      <a href="javascript:void(0)" class="checkout-steps__item d-flex align-items-center text-decoration-none">
        <span class="checkout-steps__item-number d-flex align-items-center justify-content-center me-3"
          style="background-color: #f8f9fa; color: #6c757d; width: 35px; height: 35px; border-radius: 50%; font-weight: 600; border: 1px solid #dee2e6;">03</span>
        <span class="checkout-steps__item-title">
          <span style="color: #6c757d; font-weight: 600; font-size: 14px;">Ticket</span>
          <em style="display: block; font-size: 12px; color: #6c757d; font-style: normal;">Comprobante de pago</em>
        </span>
      </a>
    </div>

    <form name="checkout-form" action="{{route('cart.place.an.order')}}" method="POST">
      @csrf
      <div class="checkout-form row">
        <!-- Billing Info Section - Left Column -->
        <div class="billing-info__wrapper col-lg-7 mb-4">
          <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-12">
                  <h4 class="mb-4"
                    style="color: #434343; font-weight: 600; font-family: 'Poppins', sans-serif; border-bottom: 2px solid #d769a3; padding-bottom: 10px;">
                    DETALLES DE PEDIDO</h4>
                </div>
              </div>
        @else
        <div class="row mt-3">
        <div class="col-md-6">
          <div class="form-floating my-3">
          <input type="text" class="form-control" name="name" required="" value="{{old('name')}}"
            style="border-radius: 8px; border: 1px solid #ced4da;">
          <label for="name" style="color: #6c757d;">Nombre Completo *</label>
          @error('name') <span class="text-danger">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating my-3">
          <input type="text" class="form-control" name="phone" required="" value="{{old('phone')}}"
            style="border-radius: 8px; border: 1px solid #ced4da;">
          <label for="phone" style="color: #6c757d;">Número de Teléfono *</label>
          @error('phone') <span class="text-danger">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-floating my-3">
          <input type="text" class="form-control" name="postcode" required="" value="{{old('postcode')}}"
            style="border-radius: 8px; border: 1px solid #ced4da;">
          <label for="postcode" style="color: #6c757d;">Código Postal *</label>
          @error('postcode') <span class="text-danger">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" name="state" required="" value="{{old('state')}}"
            style="border-radius: 8px; border: 1px solid #ced4da;">
          <label for="state" style="color: #6c757d;">Estado *</label>
          @error('state') <span class="text-danger">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-floating my-3">
          <input type="text" class="form-control" name="city" required="" value="{{old('city')}}"
            style="border-radius: 8px; border: 1px solid #ced4da;">
          <label for="city" style="color: #6c757d;">Ciudad *</label>
          

              <!-- Order Summary Section - Right Column -->
              <div class="checkout__totals-wrapper col-lg-5">
                <div class="sticky-content">
                  <div class="checkout__totals card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-body p-4">
                      <h3 class="mb-4"
                        style="color: #434343; font-weight: 600; font-family: 'Poppins', sans-serif; border-bottom: 2px solid #d769a3; padding-bottom: 10px;">
                        Tu Pedido</h3>

                      <table class="checkout-cart-items table">
                        <thead>
                          <tr style="border-bottom: 1px solid #dee2e6;">
                            <th style="color: #6c757d; font-weight: 600; font-size: 14px;">PRODUCTO</th>
                            <th align="right" style="color: #6c757d; font-weight: 600; font-size: 14px;">SUBTOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(Cart::instance('cart')->content() as $item)
                  <tr style="border-bottom: 1px solid #f5f5f5;">
                    <td style="padding: 12px 4px; color: #434343;">
                    {{$item->name}} x {{$item->qty}}
                    </td>
                    <td align="right" style="padding: 12px 4px; font-weight: 600; color: #434343;">
                    ${{$item->subtotal()}}
                    </td>
                  </tr>
                @endforeach
                        </tbody>
                      </table>

                      @if(Session::has('discounts'))
                <table class="checkout-totals table mt-3">
                  <tbody>
                  <tr>
                    <th style="border-top: none; padding: 8px 4px; color: #6c757d;">Subtotal</th>
                    <td style="border-top: none; padding: 8px 4px; text-align: right; color: #434343;">
                    ${{Cart::instance('cart')->subtotal()}}</td>
                  </tr>
                  <tr>
                    <th style="padding: 8px 4px; color: #6c757d;">Descuento {{Session::get('coupon')['code']}} </th>
                    <td style="padding: 8px 4px; text-align: right; color: #d769a3;">
                    -${{Session::get('discounts')['discount']}}</td>
                  </tr>
                  <tr>
                    <th style="padding: 8px 4px; color: #6c757d;">Subtotal después del descuento </th>
                    <td style="padding: 8px 4px; text-align: right; color: #434343;">
                    ${{Session::get('discounts')['subtotal']}}</td>
                  </tr>
                  <tr>
                    <th style="padding: 8px 4px; color: #6c757d;">Envío</th>
                    <td style="padding: 8px 4px; text-align: right; color: #28a745;">
                    Gratis
                    </td>
                  </tr>
                  <tr>
                    <th style="padding: 8px 4px; color: #6c757d;">I.V.A.</th>
                    <td style="padding: 8px 4px; text-align: right; color: #434343;">
                    ${{Session::get('discounts')['tax']}}</td>
                  </tr>
                  <tr style="border-top: 2px solid #dee2e6;">
                    <th style="padding: 12px 4px; color: #434343; font-weight: 700;">Total</th>
                    <td
                    style="padding: 12px 4px; text-align: right; font-weight: 700; font-size: 18px; color: #d769a3;">
                    ${{Session::get('discounts')['total']}}</td>
                  </tr>
                  </tbody>
                </table>
              @else
            <table class="checkout-totals table mt-3">
              <tbody>
              <tr>
                <th style="border-top: none; padding: 8px 4px; color: #6c757d;">SUBTOTAL</th>
                <td style="border-top: none; padding: 8px 4px; text-align: right; color: #434343;">
                ${{Cart::instance('cart')->subtotal()}}</td>
              </tr>
              <tr>
                <th style="padding: 8px 4px; color: #6c757d;">ENVÍO</th>
                <td style="padding: 8px 4px; text-align: right; color: #28a745;">Envío gratis</td>
              </tr>
              <tr>
                <th style="padding: 8px 4px; color: #6c757d;">I.V.A.</th>
                <td style="padding: 8px 4px; text-align: right; color: #434343;">
                ${{Cart::instance('cart')->tax()}}</td>
              </tr>
              <tr style="border-top: 2px solid #dee2e6;">
                <th style="padding: 12px 4px; color: #434343; font-weight: 700;">TOTAL</th>
                <td
                style="padding: 12px 4px; text-align: right; font-weight: 700; font-size: 18px; color: #d769a3;">
                ${{Cart::instance('cart')->total()}}</td>
              </tr>
              </tbody>
            </table>
          @endif
              </div>
            </div>

            <div class="checkout__payment-methods card border-0 shadow-sm rounded-3 mb-4">
              <div class="card-body p-4">
                <h4 class="mb-4"
                  style="color: #434343; font-weight: 600; font-family: 'Poppins', sans-serif; border-bottom: 2px solid #d769a3; padding-bottom: 10px;">
                  Método de Pago</h4>

                <div class="form-check mb-3 p-3"
                  style="border: 1px solid #dee2e6; border-radius: 8px; background-color: #f8f9fa;">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode1" value="card"
                    style="margin-top: 0.3em;">
                  <label class="form-check-label" for="mode1" style="font-weight: 500; color: #434343;">
                    <i class="far fa-credit-card me-2" style="color: #d769a3;"></i>Tarjeta de crédito o débito
                  </label>
                </div>

                <div class="form-check mb-3 p-3"
                  style="border: 1px solid #dee2e6; border-radius: 8px; background-color: #f8f9fa;">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode2"
                    value="paypal" style="margin-top: 0.3em;">
                  <label class="form-check-label" for="mode2" style="font-weight: 500; color: #434343;">
                    <i class="fab fa-paypal me-2" style="color: #0070ba;"></i>Paypal
                  </label>
                </div>

                <div class="form-check mb-4 p-3"
                  style="border: 1px solid #dee2e6; border-radius: 8px; background-color: #f8f9fa;">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode3" value="cod"
                    style="margin-top: 0.3em;">
                  <label class="form-check-label" for="mode3" style="font-weight: 500; color: #434343;">
                    <i class="fas fa-money-bill-wave me-2" style="color: #28a745;"></i>Pagar a la entrega
                  </label>
                </div>

                <div class="policy-text mt-4 p-3"
                  style="font-size: 13px; color: #6c757d; background-color: #f8f9fa; border-radius: 8px; border-left: 4px solid #d769a3;">
                  Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en este sitio web y
                  para otros fines descritos en nuestra <a href="terms.html" target="_blank"
                    style="color: #d769a3; text-decoration: none; font-weight: 600;">política de privacidad</a>.
                </div>
              </div>
            </div>

            <button class="btn btn-primary btn-checkout w-100 py-3"
              style="background-color: #d769a3; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; box-shadow: 0 4px 6px rgba(215, 105, 164, 0.3);">REALIZAR
              PEDIR</button>
          </div>
        </div>
      </div>
    </form>
  </section>
</main>
@endSection