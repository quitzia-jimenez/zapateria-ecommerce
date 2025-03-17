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
      <h2 class="page-title">Wishlist</h2>
      <div class="shopping-cart">
        @if(Cart::instance('wishlist')->content()->count() > 0)
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
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
                    {{-- <ul class="shopping-cart__product-item__options">
                      <li>Color: Yellow</li>
                      <li>Size: L</li>
                    </ul> --}}
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">${{$item->price}}</span>
                </td>
                <td>
                    {{$item->qty}}
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">
                            <form method="POST" action="{{route('wishlist.move-to.cart',['rowId'=>$item->rowId])}}">
                                @csrf
                                <button type="submit" class="btn btn-light">Mover al carrito</button>
                            </form>

                        </div>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="{{route('wishlist.item.remove',['rowId'=>$item->rowId])}}" id="remove-item {{$item->id}}">
                            @csrf
                            @method('DELETE')
                            <a href="javascript:void(0)" class="remove-cart" onclick="document.getElementById('remove-item {{$item->id}}').submit()">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                  <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                </svg>
                              </a>
                        </form>
                    </div> 
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="cart-table-footer">
            <form method="POST" action="{{route('wishlist.item.clear')}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-light">Elimiar todos los Favoritos</button>
            </form>
          </div>
        </div>
        @else
        <div class="row">
            <div class="col md 12">
                <p>Ningun articulo en tu lista de deseos</p>
                <a href="{{route('shop.index')}}" class="btn btn-info">Añade a tus favoritos ahora</a>
            </div>

        </div>
        @endif
      </div>
    </section>
</main>


@endSection


@push('scripts')
<script src="{{asset('recursos/user/js/plugins/jquery.min.js')}}"></script>
<script src="{{asset('recursos/user/js/plugins/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('recursos/user/js/plugins/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('recursos/user/js/plugins/swiper.min.js')}}"></script>
<script src="{{asset('recursos/user/js/plugins/countdown.js')}}"></script>
<script src="{{asset('recursos/user/js/theme.js')}}"></script>

@endpush