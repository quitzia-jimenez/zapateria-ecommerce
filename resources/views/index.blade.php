@extends('layouts.app')
@section('content')
<main>
         <!-- Hero Section-->
  <section class="hero-section">
    <div class="container">
      <div class="hero-content">
        <h1>Camina con estilo y confort</h1>
        <p>Descubre nuestra nueva colección de zapatos para cada ocasión. Diseño, calidad y confort en cada paso.</p>
        <div class="hero-buttons">
          <a href="{{route('shop.index')}}" class="btn btn-primary">Comprar ahora</a>
          <a href="#" class="btn btn-outline">Ver colecciones</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features-section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fa-solid fa-shop" style="color: #63E6BE;"></i>
            </div>
            <h4 class="feature-title">Entrega segura</h4>
            <p>Recoge en la sucursales ubicadas en Apizaco</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fa-solid fa-bag-shopping" style="color: #63E6BE;"></i>
            </div>
            <h4 class="feature-title">Aparta facilmente</h4>
            <p>Con un click puedes apartar tu calzado soñado</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fa-solid fa-circle-check" style="color: #63E6BE;"></i>
            </div>
            <h4 class="feature-title">Siempre con estilo</h4>
            <p>99% de nuestros clientes han encontrado el calnzado segun su estilo</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Products -->
  <section class="popular-products">
    <div class="container">
      <div class="section-title">
        <h2>Catalogo</h2>
      </div>
      <div class="row">
        @foreach($sproducts as $sproduct)
        <!-- Product 1 -->
        <div class="col-md-3">
          <div class="product-card"> 
            <div class="product-img">
              <a href="{{route('shop.product.details',['product_slug'=>$sproduct->slug])}}"><img src="{{asset('uploads/products')}}/{{$sproduct->image}}" alt="{{$sproduct->name}}"></a>
              <div class="product-overlay">
                <div class="product-options">
                  <a href="{{route('shop.product.details',['product_slug'=>$sproduct->slug])}}" data-bs-toggle="tooltip" title="Vista rápida"><i class="fas fa-eye"></i></a>
                  @if(Cart::instance('wishlist')->content()->where('id', $sproduct->id)->count() > 0)
                        <form method="POST" action="{{route('wishlist.item.remove',['rowId'=>Cart::instance('wishlist')->content()->where('id', $sproduct->id)->first()->rowId])}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit"   data-bs-toggle="tooltip" title="Eliminar de favoritos"><i class="fa-solid fa-heart" style="color: #d769a3;"></i></i></button>
                        </form>
                        @else
                        <form action="{{route('wishlist.add')}}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$sproduct->id}}">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="name" value="{{$sproduct->name}}">
                          <input type="hidden" name="price" value="{{$sproduct->sale_price == '' ? $sproduct->regular_price : $sproduct->sale_price}}">
                          <button type="submit"   data-bs-toggle="tooltip" title="Añadir a favoritos"><i class="fa-regular fa-heart" style="color: #d769a3;"></i></i></button>
                          
                        </form>
                  @endif
                  
                  
                  @if(Cart::instance('cart')->content()->where('id', $sproduct->id)->count() > 0)
                        <a href="{{route('cart.index')}}" title="Ir al carrito"><i
                          class="fas fa-shopping-cart"></i></a>
                        @else
                        <form name="addtocart-form" method="POST" action="{{route('cart.add')}}">
                          @csrf

                          <input type="hidden" name="id" value="{{$sproduct->id}}">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="name" value="{{$sproduct->name}}">
                          <input type="hidden" name="price" value="{{$sproduct->sale_price == '' ? $sproduct->regular_price : $sproduct->sale_price}}">
                          <button type="submit"   data-bs-toggle="tooltip" title="Añadir al carrito"><i class="fa-solid fa-cart-plus"></i></button>
                          
                          
                        </form>
                        @endif

                </div>
              </div>
            </div>
            <div class="product-body">
              <h5 class="product-title">{{$sproduct->name}}</h5>
              <p class="product-price">
                @if($sproduct->sale_price)
                <s>${{$sproduct->regular_price}}</s> ${{$sproduct->sale_price}}
                @else
                ${{$product->regular_price}}
                @endif
              </p>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="text-center mt-5">
        <a href="{{route('shop.index')}}" class="btn btn-primary">Ver Más Productos</a>
      </div>
    </div>
  </section>

  <!-- Categories Section -->
  <section class="categories-section">
    <div class="container">
      <div class="section-title">
        <h2>Nuestras categorías</h2>
      </div>
      <div class="row">
        @foreach($categories as $category)
        <!-- Category 1 -->
        <div class="col-md-4">
          <div class="category-card">
            <img
              src="{{asset('uploads/categories')}}/{{$category->image}}"
              alt="" class="category-img">
            <div class="category-overlay">
              <h3 class="category-name">{{$category->name}}</h3>
              <a href="{{route('shop.index',['categories'=>$category->id])}}" class="category-btn">Ver Colección</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="testimonials-section">
    <div class="container">
      <div class="section-title">
        <h2>Lo que dicen nuestros clientes</h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="testimonial-card">
            <div class="testimonial-text">
              Los zapatos que compré son increíblemente cómodos y de excelente calidad. Estoy muy satisfecha con mi
              compra y definitivamente regresaré por más.
            </div>
            <div class="testimonial-author">
              <img
                src="https://b2472105.smushcdn.com/2472105/wp-content/uploads/2023/09/Poses-Perfil-Profesional-Mujeres-ago.-10-2023-768x960.jpg?lossy=1&strip=1&webp=1"
                alt="Autor" class="author-img">
              <div class="author-info">
                <h5>Jatniel Roldan</h5>
                <span>Cliente Feliz</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card">
            <div class="testimonial-text">
              El servicio al cliente fue excepcional. Me ayudaron a encontrar el calzado perfecto para mis necesidades y
              el envío fue muy rápido.
            </div>
            <div class="testimonial-author">
              <img
                src="https://b2472105.smushcdn.com/2472105/wp-content/uploads/2023/09/Poses-Perfil-Profesional-Mujeres-ago.-10-2023-768x960.jpg?lossy=1&strip=1&webp=1"
                alt="Autor" class="author-img">
              <div class="author-info">
                <h5>Carlos Mendoza</h5>
                <span>Cliente Satisfecho</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card">
            <div class="testimonial-text">
              La relación calidad-precio es inmejorable. Llevo años comprando en BOMU y nunca me han defraudado. Son mis
              zapatos favoritos por su estilo y durabilidad.
            </div>
            <div class="testimonial-author">
              <img
                src="https://b2472105.smushcdn.com/2472105/wp-content/uploads/2023/09/Poses-Perfil-Profesional-Mujeres-ago.-10-2023-768x960.jpg?lossy=1&strip=1&webp=1"
                alt="Autor" class="author-img">
              <div class="author-info">
                <h5>Laura Torres</h5>
                <span>Cliente Leal</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection