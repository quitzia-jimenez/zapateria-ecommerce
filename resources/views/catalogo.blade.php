@extends('layouts.app')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/catalogocss.css')}}">

@endpush

@section('content')
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
              <div class="filter-group">
                <h5>Categorías</h5>
                <ul class="filter-list">
                  <li><a href="#" class="active">Todos</a></li>
                  <li><a href="#">Zapatos Casuales</a></li>
                  <li><a href="#">Zapatos Formales</a></li>
                  <li><a href="#">Deportivos</a></li>
                  <li><a href="#">Botas</a></li>
                  <li><a href="#">Sandalias</a></li>
                </ul>
              </div>
              <div class="filter-group">
                <h5>Precio</h5>
                <div class="price-slider">
                  <input type="range" min="500" max="3000" value="1500" class="slider" id="priceRange">
                  <div class="price-range">
                    <span>$500</span>
                    <span id="priceValue">$1500</span>
                    <span>$3000</span>
                  </div>
                </div>
              </div>
              <div class="filter-group">
                <h5>Tallas</h5>
                <div class="size-options">
                  <button class="size-btn">25</button>
                  <button class="size-btn">26</button>
                  <button class="size-btn">27</button>
                  <button class="size-btn">28</button>
                  <button class="size-btn">29</button>
                  <button class="size-btn">30</button>
                </div>
              </div>
              <div class="filter-group">
                <h5>Color</h5>
                <div class="color-options">
                  <button class="color-btn" style="background-color: #000;"></button>
                  <button class="color-btn" style="background-color: #964b00;"></button>
                  <button class="color-btn" style="background-color: #d8d8d8;"></button>
                  <button class="color-btn" style="background-color: #2b2d42;"></button>
                  <button class="color-btn" style="background-color: #fff; border: 1px solid #ddd;"></button>
                </div>
              </div>
              <button class="btn btn-primary filter-apply-btn">Aplicar Filtros</button>
            </div>
          </div>
          <div class="col-md-9">
            <div class="catalog-header">
              <div class="catalog-title">
                <h2>Todo</h2>
                <p><span class="product-count">24</span> productos encontrados</p>
              </div>
              <div class="catalog-sort">
                <select class="form-select">
                  <option selected>Ordenar por</option>
                  <option>Precio: Menor a Mayor</option>
                  <option>Precio: Mayor a Menor</option>
                  <option>Popularidad</option>
                  <option>Más recientes</option>
                </select>
              </div>
            </div>

            <div class="featured-categories">
              <div class="category-badge">
                <img src="https://florsheimshoes.com.mx/wp-content/uploads/2022/10/00046pri.jpg" alt="Formales">
                <span>Formales</span>
              </div>
              <div class="category-badge">
                <img src="https://www.varugu.com/cdn/shop/files/tenis-zapatos-formales.jpg?v=1722296599&width=1445"
                  alt="Casuales">
                <span>Casuales</span>
              </div>
              <div class="category-badge">
                <img src="https://http2.mlstatic.com/D_NQ_NP_995342-MLM78769631922_092024-O.webp" alt="Deportivos">
                <span>Deportivos</span>
              </div>
              <div class="category-badge">
                <img
                  src="https://fredzapaterias.com.mx/cdn/shop/collections/zapatos-de-vestir-hombre-casuales-flexi-quirelli-brantano-lobo-solo-gino-compra-online-zapateria-fred-precio-flexi-tienda-compra-aqui_1200x1200.webp?v=1699030754"
                  alt="Botas">
                <span>Botas</span>
              </div>
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
                          <a href="#" data-bs-toggle="tooltip" title="Añadir a favoritos"><i
                              class="fas fa-heart"></i></a>
                          <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i
                              class="fas fa-shopping-cart"></i></a>
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

  <!-- Recently Viewed -->
  <section class="recently-viewed">
    <div class="container">
      <div class="section-title">
        <h2>Vistos Recientemente</h2>
      </div>
      <div class="swiper recently-viewed-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="product-card">
              <div class="product-img">
                <img src="https://florsheimshoes.com.mx/wp-content/uploads/2022/10/00046pri.jpg" alt="Zapato Oxford">
                <div class="product-overlay">
                  <div class="product-options">
                    <a href="#"><i class="fas fa-eye"></i></a>
                    <a href="#"><i class="fas fa-heart"></i></a>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-body">
                <h5 class="product-title">Oxford Classic</h5>
                <p class="product-price">$1,299.00</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card">
              <div class="product-img">
                <img src="https://www.varugu.com/cdn/shop/files/tenis-zapatos-formales.jpg?v=1722296599&width=1445"
                  alt="Zapato Casual">
                <div class="product-overlay">
                  <div class="product-options">
                    <a href="#"><i class="fas fa-eye"></i></a>
                    <a href="#"><i class="fas fa-heart"></i></a>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-body">
                <h5 class="product-title">Urban Comfort</h5>
                <p class="product-price">$999.00</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card">
              <div class="product-img">
                <img src="https://arantzaonline.com/cdn/shop/files/040316_7.jpg?v=1713826676" alt="Zapato Formal">
                <div class="product-overlay">
                  <div class="product-options">
                    <a href="#"><i class="fas fa-eye"></i></a>
                    <a href="#"><i class="fas fa-heart"></i></a>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-body">
                <h5 class="product-title">Executive Plus</h5>
                <p class="product-price">$1,499.00</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card">
              <div class="product-img">
                <img src="https://http2.mlstatic.com/D_NQ_NP_995342-MLM78769631922_092024-O.webp" alt="Tenis deportivo">
                <div class="product-overlay">
                  <div class="product-options">
                    <a href="#"><i class="fas fa-eye"></i></a>
                    <a href="#"><i class="fas fa-heart"></i></a>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-body">
                <h5 class="product-title">Running Pro</h5>
                <p class="product-price">$1,799.00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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
            <p>Elegancia y comodidad. Aprovecha 15% de descuento en tu primera compra.</p>
            <a href="#" class="btn btn-light">Comprar Ahora</a>
          </div>
        </div>
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <img
            src="https://fredzapaterias.com.mx/cdn/shop/collections/zapatos-de-vestir-hombre-casuales-flexi-quirelli-brantano-lobo-solo-gino-compra-online-zapateria-fred-precio-flexi-tienda-compra-aqui_1200x1200.webp?v=1699030754"
            alt="Promoción" class="img-fluid promotion-img">
        </div>
      </div>
    </div>
  </section>


@endsection

