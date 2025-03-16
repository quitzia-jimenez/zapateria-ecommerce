@extends('layouts.app')
@section('css')
<link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer">


<link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/indexcss.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/swiper.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/custom.css')}}">
@endsection

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Cart</h2>
      <div class="checkout-steps">
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <div class="shopping-cart">
        @if($items->count() > 0)
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    <img loading="lazy" src="{{asset('uploads/products/thumbnails')}}/{{$item->model->image}}" width="120" height="120" alt="{{$item->name}}" />
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4>{{$item->name}}</h4>
                    <ul class="shopping-cart__product-item__options">
                      <li>Color: Yellow</li>
                      <li>Size: L</li>
                    </ul>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">{{$item->price}}</span>
                </td>
                <td>
                  <div class="qty-control position-relative">
                    <input type="number" name="quantity" value="{{$item->qty}}" min="1" class="qty-control__number text-center">
                    
                    <form action="{{route('cart.qty.decrese',['rowId'=>$item->rowId])}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="qty-control__reduce">-</button>

                    </form>

                    <form action="{{route('cart.qty.increse',['rowId'=>$item->rowId])}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="qty-control__increase">+</button>

                  </form>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__subtotal">${{$item->subTotal()}}</span>

                </td>
                <td>
                  <form action="{{route('cart.item.remove',['rowId'=>$item->rowId])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="javascript:void(0)" class="remove-cart">
                      <button type="submit" class="qty-control__increase">x</button>
                      </svg>
                    </a>

                  </form>
                  
                </td>
              </tr>
              @endforeach
              </tbody>
          </table>
          <div class="cart-table-footer">
            <form action="#" class="position-relative bg-body">
              <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
              <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
                value="APPLY COUPON">
            </form>
            <form action="{{route('cart.empty')}}" method="POST">
            @csrf
            @method('DELETE')
              <button class="btn btn-light">Limpiar Carrito</button>
            </form>
          </div>
        </div>

        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Total productos</h3>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>${{Cart::instance('cart')->subtotal()}}</td>
                  </tr>
                  <tr>
                    <th>Shipping</th>
                    <td>
                      Free
                    </td>
                  </tr>
                  <tr>
                    <th>VAT</th>
                    <td>${{Cart::instance('cart')->tax()}}</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>${{Cart::instance('cart')->total()}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <a href="checkout.html" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="col-md-12 text-center pt-5 bp-5">
            <h2 class="text-center">No se encontro ningun producto</h2>
            <a href="{{route('shop.index')}}" class="btn btn-primary">Compra Ahora!</a>
        </div>

        @endif
      </div>
    </section>
</main>

@endSection




@push('scripts')
<script>
  $(function(){
    $(".qty-control__increase").on('click', function(){
      $(this).closest('form').submit();
    });
    $(".qty-control__reduce").on('click', function(){
      $(this).closest('form').submit();
    });
    $(".remove-cart").on('click', function(){
      $(this).closest('form').submit();
    });
  })
</script>

@endpush