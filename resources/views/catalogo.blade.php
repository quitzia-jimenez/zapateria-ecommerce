@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/catalogocss.css')}}">
<style>
   .shop-acs__select {
    padding-right: 0.9375rem;
    background-position: right center;
    cursor: pointer;
    padding-left: 0;
    box-shadow: none !important;
    text-transform: uppercase;
    font-weight: 500; }
</style>
@endsection
@push('scripts')

@endpush
@section('content')

<!-- Mensajes Flash -->
@if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Éxito!</strong> Tu compra la puedes ver en tus compras, tu comprobante se ha recibido correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<main>
   <!-- Hero Banner -->
 <section class="catalog-hero">
  <div class="container">
    <div class="catalog-hero-content animate__animated animate__fadeIn">
      <h1>Catalogo</h1>
      <p>Descubre nuestra exclusiva selección de calzado, donde estilo y confort se unen para cada ocasión.
      </p>
    </div>
  </div>
</section>

<!-- Filtros y Categorías -->
<section class="filters-section">
  <div class="container">
    <div class="filters-container">
      <div class="row">
        <div class="col-md-3">
          <div class="filter-sidebar">
            <h4>Filtrar por</h4>
            <div class="filter-group" data-bs-parent='#categories-list'>
              <h5>Categorías</h5>
              <ul class="filter-list category-list">
                @foreach($categories as $category)
                <li>
                  <span class="menu-link py-1">
                    <input type="checkbox" class="chk-category hdnCategories" name="categories" value="{{$category->id}}" 
                      @if(in_array($category->id,explode(',',$f_categories))) checked="checked" @endif
                    />
                    {{$category->name}}

                  </span>
                  <span class="float-end">{{$category->products->count()}}</span>

                </li>

                @endforeach
              </ul>
            </div>
            <div class="filter-group">
              <h5>Precio</h5>
              <div class="price-slider">
                  <input type="text" class="price-range-slider" data-currency="$" data-slider-min="50" data-slider-max="1000"
                      data-slider-step="5" data-slider-value="[{{$min_price}},{{$max_price}}]" value="" name="price_range"/>
                  <div class="price-range">
                      <span>$50</span>
                      <span id="priceValue">${{$min_price}} - ${{$max_price}}</span>
                      <span>$1000</span>
                  </div>
              </div>
          </div>
            <div class="filter-group">
              <h5>
                <a class="btn btn-link" data-bs-toggle="collapse" href="#collapseSizes" role="button" aria-expanded="false" aria-controls="collapseSizes">
                  Tallas
                </a>
              </h5>
              <div class="collapse hdnZises" id="collapseSizes">
                <div class="size-options">
                  @foreach($sizes as $size)
                    <a href="{{ route('shop.index', array_merge(request()->query(), ['size' => $size->size])) }}" class="size-btn {{ request()->query('size') == $size->size ? 'active' : '' }}">
                      {{ $size->size }}
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
            <button class="btn btn-primary filter-apply-btn">Aplicar Filtros</button>
          </div>
        </div>
        <div class="col-md-9">
          <div class="catalog-header">
            <div class="catalog-title">
              <h2>Todo</h2>
            </div>
              <div class="catalog-sort">
                <select class="form-select" aria-label="Tamaño de pagina" id="pagesize" name="pagesize">
                    <option value="12" {{ $sizep==12 ? 'selected' : ''}}>Mostrar</option>
                    <option value="24" {{ $sizep==24 ? 'selected' : ''}}>24</option>
                    <option value="48" {{ $sizep==48 ? 'selected' : ''}}>48</option>
                    <option value="102" {{ $sizep==102 ? 'selected' : ''}}>102</option>
                </select>
            </div>
            <div class="catalog-sort">
                <select class="form-select w-auto shop-acs__select" aria-label="Ordenar por" name="orderby" id="orderby">
                    <option value="-1" {{$order == -1 ? 'selected' : ''}}>Ordenar por</option>
                    <option value="1" {{$order == 1 ? 'selected' : ''}}>Fecha: Pasados</option>
                    <option value="2" {{$order == 2 ? 'selected' : ''}}>Fecha: Recientes</option>
                    <option value="3" {{$order == 3 ? 'selected' : ''}}>Precio: Menor a Mayor</option>
                    <option value="4" {{$order == 4 ? 'selected' : ''}}>Precio: Mayor a Menor</option>
                </select>
            </div>
          </div>
          
    

          <div class="featured-categories">
            @foreach($categories as $category)
            <div class="category-badge">
              <img src="{{asset('uploads/categories')}}/{{$category->image}}" alt="Formales">
              <span value="{{$category->id}}" 
                @if(in_array($category->id,explode(',',$f_categories))) @endif>
                {{$category->name}}</span>
            </div>
            @endforeach

           
            
            
            
          </div>

          <div class="products-grid">
            

            <div class="row">
              @foreach($products as $product)
              <!-- Product 1 -->
              <div class="col-md-4">
                <div class="product-card">
                  <div class="product-badges">
                    <span class="badge-new">Nuevo</span>
                  </div>
                  <div class="product-img">
                    <a href="{{route('shop.product.details',['product_slug'=>$product->slug])}}"><img src="{{asset('uploads/products')}}/{{$product->image}}" alt="{{$product->name}}"></a>
                    <div class="product-overlay">
                      <div class="product-options">

                        
                        <a href="{{route('shop.product.details',['product_slug'=>$product->slug])}}" data-bs-toggle="tooltip" title="Vista rápida"><i class="fas fa-eye"></i></a>

                        @if(Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
                        <form method="POST" action="{{route('wishlist.item.remove',['rowId'=>Cart::instance('wishlist')->content()->where('id', $product->id)->first()->rowId])}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit"   data-bs-toggle="tooltip" title="Eliminar de favoritos"><i class="fa-solid fa-heart" style="color: #d769a3;"></i></i></button>
                        </form>
                        @else
                        <form action="{{route('wishlist.add')}}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$product->id}}">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="name" value="{{$product->name}}">
                          <input type="hidden" name="price" value="{{$product->sale_price == '' ? $product->regular_price : $product->sale_price}}">
                          <button type="submit"   data-bs-toggle="tooltip" title="Añadir a favoritos"><i class="fa-regular fa-heart" style="color: #d769a3;"></i></i></button>
                          
                        </form>
                        @endif

                        @if(Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
                        <a href="{{route('cart.index')}}" title="Ir al carrito"><i
                          class="fas fa-shopping-cart"></i></a>
                        @else
                        <form name="addtocart-form" method="POST" action="{{route('cart.add')}}">
                          @csrf

                          <input type="hidden" name="id" value="{{$product->id}}">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="name" value="{{$product->name}}">
                          <input type="hidden" name="price" value="{{$product->sale_price == '' ? $product->regular_price : $product->sale_price}}">
                          <button type="submit"   data-bs-toggle="tooltip" title="Añadir al carrito"><i class="fa-solid fa-cart-plus"></i></button>
                          
                          
                        </form>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="product-body">
                    <div class="product-category">{{$product->category->name}}</div>
                    <h5 class="product-title">{{$product->name}}</h5>
                    <div class="product-rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                      <span>(4.5)</span>
                    </div>
                    <p class="product-price">
                      @if($product->sale_price)
                      <s>${{$product->regular_price}}</s> ${{$product->sale_price}}
                      @else
                      ${{$product->regular_price}}
                      @endif
                    </p>
                  </div>
                </div>
              </div>

              @endforeach
            
          </div>
          

          <!-- Paginación -->
          <div class="divider"></div>
          <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
            {{$products->links('pagination::bootstrap-5')}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Promotion Banner -->
<section class="promotion-banner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 animate__animated animate__fadeInLeft">
        <div class="promotion-content">
          <h2>Descubre nuestra colección exclusiva</h2>
          <p>Elegancia y comodidad. Aprovecha 15% de descuento apartando en linea. Utiliza BOMU15 para obtener descuento. Aplicado a compras mayores de $500</p>
          <a href="{{route('shop.index')}}" class="btn btn-light">Comprar Ahora</a>
        </div>
      </div>
      <div class="col-md-6 animate__animated animate__fadeInRight">
        <img
          src="https://fredzapaterias.com.mx/cdn/shop/collections/zapatos-de-vestir-hombre-casuales-flexi-quirelli-brantano-lobo-solo-gino-compra-online-zapateria-fred-precio-flexi-tienda-compra-aqui_1200x1200.webp?v=1699030754"
          alt="Promoción" class="img-fluid promotion-img">
      </div>
      
    </div>
    <div class="divider"></div>
      <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
        {{$products->withQueryString()->links('pagination::bootstrap-5')}}
      </div>
  </div>
</section>
</main>

  <form id="frmfilter" method="GET" action="{{route('shop.index')}}">
    <input type="hidden" name="page" value="{{$products->currentPage()}}">
    <input type="hidden" name="sizep" id="sizep" value="{{$sizep}}"/>
    <input type="hidden" name="order" id="order" value="{{$order}}"/>
    <input type="hidden" name="categories" id="hdnCategories"/>
    <input type="hidden" name="sizes" id="hdnZises"/>
    <input type="hidden" name="min" id="hdnMinPrice" value="{{$min_price}}"/>
    <input type="hidden" name="max" id="hdnMaxPrice" value="{{$max_price}}"/>
  </form>

@endsection

@push('scripts')
<script>
  $(function(){
    $("#pagesize").on('change', function(){
      $("#sizep").val($(this).val());
      $("#frmfilter").submit();
    });
    $("#orderby").on('change', function(){
      $("#order").val($(this).val());
      $("#frmfilter").submit();
    });
    $("input[name='categories']").on('change', function(){
      var categories = "";
      $("input[name='categories']:checked").each(function(){
        if(categories == "")
        {
          categories +=$(this).val();
        }
        else
        {
          categories += "," + $(this).val();
        }
      });
      $("#hdnCategories").val(categories);
      $("#frmfilter").submit();
    });
    $("input[name='zises']").on('change', function(){
      var zises = "";
      $("input[name='zises']:checked").each(function(){
        if(zises == "")
        {
          zises +=$(this).val();
        }
        else
        {
          zises += "," + $(this).val();
        }
      });
      $("#hdnZises").val(zises);
      $("#frmfilter").submit();
    });
    $('.price-range-slider').slider({
      tooltip_split: true,
      formatter: function(value) {
        return '$' + value;
      }
    }).on('slideStop', function(event) {
      var prices = event.value;
      $("#hdnMinPrice").val(prices[0]);
      $("#hdnMaxPrice").val(prices[1]);
      $("#frmfilter").submit();
    });

  });
</script>

@endpush

