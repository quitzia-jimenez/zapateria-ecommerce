@extends('layouts.app')
@section('css')
@endsection

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Envío y Pago</h2>
      <div class="checkout-steps">
        <a href="{{route('cart.index')}}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Comprar carrito</span>
            <em>Lista de carrito</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Envío y Pag</span>
            <em>
                Consulta tu Lista de Artículos</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmacion</span>
            <em>Revise y Envíe Su Pedido</em>
          </span>
        </a>
      </div>
      <form name="checkout-form" action="{{route('cart.place.an.order')}}" method="POST">
        @csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>DETALLES DE ENVÍO</h4>
              </div>
              <div class="col-6">
              </div>
            </div>
            @if($address)
            <div class="row">
                <div class="col-md-12">
                    <div class="my-account_address-list">
                        <div class="my-account_address-list-item">
                            <div class="my-account_address-item_detail">
                                <p>{{$address->name}}</p>
                                <p>{{$address->address}}</p>
                                <p>{{$address->landmark}}</p>
                                <p>{{$address->city}}, {{$address->state}}, {{$address->country}}</p>
                                <p>{{$address->postcode}}</p>
                                <br/>
                                <p>{{$address->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @else
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="name" required="" value="{{old('name')}}">
                  <label for="name">Full Name *</label>
                  @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="phone" required="" value="{{old('phone')}}">
                  <label for="phone">Phone Number *</label>
                  @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="postcode" required="" value="{{old('postcode')}}">
                  <label for="postcode">Pincode *</label>
                  @error('postcode') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" class="form-control" name="state" required="" value="{{old('state')}}">
                  <label for="state">State *</label>
                  @error('state') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="city" required="" value="{{old('city')}}">
                  <label for="city">Town / City *</label>
                  @error('city') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="address" required="" value="{{old('address')}}">
                  <label for="address">House no, Building Name *</label>
                  @error('address') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="locality" required="" value="{{old('locality')}}">
                  <label for="locality">Road Name, Area, Colony *</label>
                  @error('locality') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="landmark" required="" value="{{old('landmark')}}">
                  <label for="landmark">Landmark *</label>
                  @error('landmark') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
            </div>
            @endif
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Your Order</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>PRODUCT</th>
                      <th align="right">SUBTOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(Cart::instance('cart')->content() as $item)
                    <tr>
                      <td>
                        {{$item->name}} x {{$item->qty}}
                      </td>
                      <td align="right">
                        ${{$item->subtotal()}}
                      </td>
                    </tr>
                    
                    @endforeach
                  </tbody>
                </table>
                @if(Session::has('discounts'))
                <table class="checkout-totals">
                    <tbody>
                        <tr>
                          <th>Subtotal</th>
                          <td>${{Cart::instance('cart')->subtotal()}}</td>
                        </tr>
                        <tr>
                          <th>Descuento {{Session::get('coupon')['code']}} </th>
                          <td>${{Session::get('discounts')['discount']}}</td>
                        </tr>
                        <tr>
                          <th>Subtotal despues del descuento </th>
                          <td>${{Session::get('discounts')['subtotal']}}</td>
                        </tr>
                        <tr>
                          <th>Envio</th>
                          <td>
                            Gratis
                          </td>
                        </tr>
                        <tr>
                          <th>I.V.A.</th>
                          <td>${{Session::get('discounts')['tax']}}</td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td>${{Session::get('discounts')['total']}}</td>
                        </tr>
                    </tbody>
                   
                </table>

                @else
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>SUBTOTAL</th>
                      <td align="right">${{Cart::instance('cart')->subtotal()}}</td>
                    </tr>
                    <tr>
                      <th>ENVIO</th>
                      <td align="right">Envio gratis</td>
                    </tr>
                    <tr>
                      <th>I.V.A.</th>
                      <td align="right">${{Cart::instance('cart')->tax()}}</td>
                    </tr>
                    <tr>
                      <th>TOTAL</th>
                      <td align="right">${{Cart::instance('cart')->total()}}</td>
                    </tr>
                  </tbody>
                </table>
                @endif
              </div>
              <div class="checkout__payment-methods">
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode1" value="card">
                  <label class="form-check-label" for="mode1">
                    Tarjeta de crédito o débito
                  </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode2" value="paypal">
                    <label class="form-check-label" for="mode2">
                        Paypal
                    </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode3" value="cod">
                  <label class="form-check-label" for="mode3">
                    Pagar a la entrega
                  </label>
                </div>
                
                <div class="policy-text">
                  Your personal data will be used to process your order, support your experience throughout this
                  website, and for other purposes described in our <a href="terms.html" target="_blank">privacy
                    policy</a>.
                </div>
              </div>
              <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
            </div>
          </div>
        </div>
      </form>
    </section>
</main>


@endSection

