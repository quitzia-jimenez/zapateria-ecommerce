@extends('layouts.app')

@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css"
    integrity="sha512-okkLcBJE+U19Dpd0QdHA1wn4YY6rW3CwaxeLJT3Jmj9ZcNSbln/VYw8UdqXRIwLX7J8PmtHs0I/FPAhozFvXKg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-vo2FiyzIwWBRpD2M8f8+swDD8S/U+BhVf0A+VhC/9JSt+vT94HLdHoxz0FhpZn5TA+SXb7WlS4uLrNn1w7rDIw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Custom CSS -->
  <style>
    :root {
    --primary-color: #3498db;
    --secondary-color: #2c3e50;
    --accent-color: #f39c12;
    --border-color: #e0e0e0;
    --light-bg: #f8f9fa;
    }

    body {
    background-color: var(--light-bg);
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }

    .swiper-button-next,
    .swiper-button-prev {
    width: 40px;
    height: 40px;
    background-color: white;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
    font-size: 18px;
    font-weight: bold;
    }

    .swiper-pagination-bullet-active {
    background-color: var(--primary-color);
    }

    .product-gallery {
    transition: all 0.3s ease;
    }

    .thumbnail-swiper .swiper-slide {
    opacity: 0.7;
    transition: opacity 0.3s ease;
    }

    .thumbnail-swiper .swiper-slide:hover {
    opacity: 1;
    }

    .card {
    overflow: hidden;
    transition: all 0.3s ease;
    }

    .card:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
    transition: all 0.3s ease;
    }

    .btn-primary:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-secondary:hover {
    background-color: var(--secondary-color);
    color: white;
    }

    input[type="number"] {
    -moz-appearance: textfield;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    .nav-tabs .nav-link {
    border: none;
    position: relative;
    color: #6c757d;
    font-weight: 600;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    }

    .nav-tabs .nav-link.active {
    background-color: transparent;
    color: var(--secondary-color);
    }

    .nav-tabs .nav-link:hover {
    border-color: transparent;
    color: var(--primary-color);
    }

    .fa-star,
    .fa-star-o {
    cursor: pointer;
    }

    @media (max-width: 767.98px) {
    .product-gallery {
      margin-bottom: 2rem;
    }
    }

    @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
    }

    .tab-pane.fade.show.active {
    animation: fadeIn 0.5s ease;
    }

    .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }

    .badge-sale {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: var(--accent-color);
    color: white;
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    border-radius: 30px;
    font-weight: 700;
    }
  </style>
@endsection

@section('content')
  <main class="pt-5">
    <div class="container">
    <div class="row mb-5 g-4">
      <!-- Product Images Column -->
      <div class="col-lg-6">
      <div class="product-gallery position-relative bg-white shadow-sm rounded-3 p-3">
        <!-- Main Image Swiper -->
        <div class="swiper-container mb-3">
        <div class="swiper-wrapper">
          <div class="swiper-slide text-center">
          <img src="{{asset('uploads/products')}}/{{$product->image}}" class="img-fluid rounded-3"
            alt="{{$product->name}}" style="max-height: 450px; object-fit: contain; width: 79%;">
          </div>
          @foreach (explode(',', $product->images) as $gimg)
        <div class="swiper-slide text-center">
        <img src="{{asset('uploads/products')}}/{{$gimg}}" class="img-fluid rounded-3" alt="{{$product->name}}"
        style="max-height: 450px; object-fit: contain;  width: 79%;">
        </div>
      @endforeach
        </div>
        <div class="swiper-button-prev" style="color: var(--primary-color); --swiper-navigation-size: 30px;"></div>
        <div class="swiper-button-next" style="color: var(--primary-color); --swiper-navigation-size: 30px;"></div>
        </div>

        <!-- Thumbnail Navigation -->
        <div class="swiper-container thumbnail-swiper mt-3">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
          <img src="{{asset('uploads/products')}}/{{$product->image}}" class="img-fluid rounded-3"
            style="border: 2px solid transparent; cursor: pointer; height: 80px; width: 100%; object-fit: cover;"
            alt="thumbnail">
          </div>
          @foreach (explode(',', $product->images) as $gimg)
        <div class="swiper-slide">
        <img src="{{asset('uploads/products/thumbnails')}}/{{$gimg}}" class="img-fluid rounded-3"
        style="border: 2px solid transparent; cursor: pointer; height: 80px; width: 100%; object-fit: cover;"
        alt="thumbnail">
        </div>
      @endforeach
        </div>
        </div>
      </div>
      </div>

      <!-- Product Info Column -->
      <div class="col-lg-6">
      <div class="bg-white shadow-sm rounded-3 p-4">
        <h1 class="mb-3 fs-2 fw-bold" style="color: var(--secondary-color);">{{$product->name}}</h1>

        <!-- Rating Stars -->
        <div class="d-flex align-items-center mb-3">
        <div class="text-warning me-3">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
        </div>

        </div>

        <!-- Price -->
        <div class="mb-4">
        <h3>
          @if($product->sale_price)
        <span class="text-muted text-decoration-line-through fs-5 me-2">${{$product->regular_price}}</span>
        <span style="color: var(--primary-color); font-weight: 700;">${{$product->sale_price}}</span>
      @else
      <span style="color: var(--primary-color); font-weight: 700;">${{$product->regular_price}}</span>
    @endif
        </h3>
        </div>

        <!-- Short Description -->
        <div class="mb-4">
        <p class="lead" style="font-size: 1rem; line-height: 1.6;">{{$product->short_description}}</p>
        </div>

        <!-- Tallas Disponibles -->
        <div class="mb-4">
          <label for="sizes" class="form-label">Tallas disponibles:</label>
          <div id="sizes">
            @foreach($sizes as $size)
              <span class="badge bg-secondary me-2">{{ $size->size }}</span>
            @endforeach
          </div>
        </div>

        <!-- Add to Cart Form -->
        @if(Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
      <a href="{{route('cart.index')}}" class="btn btn-warning mb-4 py-2 px-4 fw-semibold"
      style="background-color: var(--accent-color); border-color: var(--accent-color); border-radius: 8px;">
      <i class="fa fa-shopping-cart me-2"></i>Ir al carrito
      </a>
    @else
    <form name="addtocart-form" method="POST" action="{{route('cart.add')}}" class="mb-4">
    @csrf
    <div class="d-flex align-items-center mb-3">
      <div class="input-group me-3" style="width: 130px;">
      <button type="button" class="btn btn-outline-secondary qty-control__reduce"
      style="border-color: var(--border-color); border-radius: 8px 0 0 8px;">
      <i class="fa fa-minus"></i>
      </button>
      <input type="number" name="quantity" value="1" min="1" class="form-control text-center"
      style="border-color: var(--border-color); border-left: 0; border-right: 0;">
      <button type="button" class="btn btn-outline-secondary qty-control__increase"
      style="border-color: var(--border-color); border-radius: 0 8px 8px 0;">
      <i class="fa fa-plus"></i>
      </button>
      </div>
      <input type="hidden" name="id" value="{{$product->id}}">
      <input type="hidden" name="name" value="{{$product->name}}">
      <input type="hidden" name="price"
      value="{{$product->sale_price == '' ? $product->regular_price : $product->sale_price}}">
      <button type="submit" class="btn btn-primary py-2 px-4 fw-semibold"
      style="background-color: var(--primary-color); border-color: var(--primary-color); border-radius: 8px;">
      <i class="fa fa-cart-plus me-2"></i>Agregar al carrito
      </button>
    </div>
    </form>
  @endif

        <!-- Wishlist and Share -->
        <div class="d-flex mb-4">
        @if(Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
      <form method="POST"
        action="{{route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->id)->first()->rowId])}}"
        id="frm-remove-item">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-secondary me-2 py-2"
        style="border-color: var(--border-color); border-radius: 8px; font-weight: 500;">
        <i class="fa fa-heart me-2" style="color: var(--primary-color);"></i> Eliminar de la lista de deseos
        </button>
      </form>
    @else
    <form action="{{route('wishlist.add')}}" method="POST" id="wishlist-form">
      @csrf
      <input type="hidden" name="id" value="{{$product->id}}">
      <input type="hidden" name="quantity" value="1">
      <input type="hidden" name="name" value="{{$product->name}}">
      <input type="hidden" name="price"
      value="{{$product->sale_price == '' ? $product->regular_price : $product->sale_price}}">
      <button type="submit" class="btn btn-outline-secondary me-2 py-2"
      style="border-color: var(--border-color); border-radius: 8px; font-weight: 500;">
      <i class="fa fa-heart-o me-2"></i> Agregar a la lista de deseos
      </button>
    </form>
  @endif

        <button class="btn btn-outline-secondary py-2"
          style="border-color: var(--border-color); border-radius: 8px; font-weight: 500;">
          <i class="fa fa-share-alt me-2"></i> Compartir
        </button>
        </div>

        <!-- Product Meta Info -->
        <div class="card mb-4"
        style="border-color: var(--border-color); border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <div class="card-body">
          <div class="row mb-2">
          <div class="col-4 fw-bold">SKU:</div>
          <div class="col-8">{{$product->SKU}}</div>
          </div>
          <div class="row">
          <div class="col-4 fw-bold">Categoría:</div>
          <div class="col-8">{{$product->category->name}}</div>
          </div>
        </div>
        </div>

        <!-- Delivery and Return Info -->
        <div class="d-flex flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center">
          <i class="fa fa-truck me-2" style="color: var(--primary-color);"></i>
          <span>Envío gratis en los pedidos</span>
        </div>
        </div>
      </div>
      </div>
    </div>

    <!-- Product Details Tabs -->
    <div class="row mb-5">
      <div class="col-12">
      <div class="bg-white shadow-sm rounded-3 p-4">
        <ul class="nav nav-tabs mb-4" id="productTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active fw-semibold" id="description-tab" data-bs-toggle="tab"
          data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true"
          style="color: var(--secondary-color); border-bottom: 2px solid transparent;">Descripción</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link fw-semibold" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
          type="button" role="tab" aria-controls="reviews" aria-selected="false"
          style="color: var(--secondary-color); border-bottom: 2px solid transparent;">Opiniones (2)</button>
        </li>
        </ul>

        <div class="tab-content" id="productTabsContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
          <div class="p-4 bg-light rounded-3">
          <p style="line-height: 1.8;">{{$product->description}}</p>
          </div>
        </div>

        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
          <div class="p-4 bg-light rounded-3">
          <!-- Example Review -->
          <div class="card mb-4"
            style="border-color: var(--border-color); border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div class="card-body">
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
              <img
                src="https://w7.pngwing.com/pngs/164/963/png-transparent-male-avatar-boy-face-man-user-flat-classy-users-icon.png"
                class="rounded-circle" alt="user" width="50" height="50" style="object-fit: cover;">
              </div>
              <div class="ms-3">
              <h5 class="mb-1 fw-bold">Rodrigo Sosa Romero</h5>
              <div class="text-warning mb-1">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p class="text-muted small">Publicado el 10 de marzo 2025</p>
              </div>
            </div>
            <p style="line-height: 1.6;">Es un muy buen producto</p>
            </div>
          </div>

          <!-- Review Form -->
          <h4 class="mb-3 fw-bold">Escribir una opinión</h4>
          <form>
            <div class="mb-3">
            <label class="form-label fw-semibold">Tu calificación</label>
            <div class="text-warning mb-2 fs-5">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            </div>
            <div class="mb-3">
            <label for="review" class="form-label fw-semibold">¿Qué opinas?</label>
            <textarea class="form-control" id="review" rows="3"
              style="border-color: var(--border-color); border-radius: 8px;"></textarea>
            </div>
            <div class="row mb-3">
            <div class="col-md-6">
              <label for="name" class="form-label fw-semibold">Nombre</label>
              <input type="text" class="form-control" id="name"
              style="border-color: var(--border-color); border-radius: 8px;">
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label fw-semibold">Correo</label>
              <input type="email" class="form-control" id="email"
              style="border-color: var(--border-color); border-radius: 8px;">
            </div>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-4 fw-semibold"
            style="background-color: var(--primary-color); border-color: var(--primary-color); border-radius: 8px;">Enviar</button>
          </form>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>

    <!-- Related Products -->
    <div class="row mb-5">
      <div class="col-12">
      <h3 class="mb-4 fw-bold" style="color: var(--secondary-color);">Productos relacionados</h3>
      <div class="swiper-container related-products">
        <div class="swiper-wrapper">
        @foreach ($rproducts as $rproduct)
      <div class="swiper-slide">
        <div class="card h-100 border-0 shadow-sm"
        style="border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)';"
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)';">
        <div class="position-relative">
        <a href="{{route('shop.product.details', ['product_slug' => $rproduct->slug])}}">
        <img src="{{asset('uploads/products/thumbnails')}}/{{$rproduct->image}}" class="card-img-top"
          alt="{{$rproduct->name}}" style="height: 200px; object-fit: cover; border-radius: 12px 12px 0 0;">
        </a>
        @if($rproduct->sale_price)
      <span class="position-absolute top-0 end-0 bg-danger text-white fw-bold px-2 py-1 m-2 rounded-pill"
      style="font-size: 0.8rem;">Promoción</span>
    @endif
        </div>
        <div class="card-body d-flex flex-column">
        <p class="card-text text-muted small mb-1">{{$rproduct->category->name}}</p>
        <h5 class="card-title mb-2">
        <a href="{{route('shop.product.details', ['product_slug' => $rproduct->slug])}}"
          class="text-decoration-none"
          style="color: var(--secondary-color); font-weight: 600;">{{$rproduct->name}}</a>
        </h5>
        <p class="card-text mb-3">
        @if($rproduct->sale_price)
      <span class="text-muted text-decoration-line-through me-2">${{$rproduct->regular_price}}</span>
      <span style="color: var(--primary-color); font-weight: 700;">${{$rproduct->sale_price}}</span>
    @else
    <span style="color: var(--primary-color); font-weight: 700;">${{$rproduct->regular_price}}</span>
  @endif
        </p>
        <div class="d-flex justify-content-between mt-auto">
        @if(Cart::instance('cart')->content()->where('id', $rproduct->id)->count() > 0)
      <a href="{{route('cart.index')}}" class="btn btn-sm btn-outline-secondary"
        style="border-radius: 8px; font-weight: 500;">Ver en el carrito</a>
    @else
    <form action="{{route('cart.add')}}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{$rproduct->id}}">
      <input type="hidden" name="name" value="{{$rproduct->name}}">
      <input type="hidden" name="quantity" value="1">
      <input type="hidden" name="price"
      value="{{$rproduct->sale_price == '' ? $rproduct->regular_price : $rproduct->sale_price}}">
      <button type="submit" class="btn btn-sm btn-primary"
      style="background-color: var(--primary-color); border-color: var(--primary-color); border-radius: 8px; font-weight: 500;">Agregar al carrito</button>
    </form>
  @endif
        </div>
        </div>
        </div>
      </div>
    @endforeach
        </div>
        <div class="swiper-pagination mt-4"></div>
      </div>
      </div>
    </div>
    </div>
  </main>

@endsection
@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"
    integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"
    integrity="sha512-wdUM0BxMyMC/Yem1RWDiIiXA6ssXMoxypihVEwxDc+ftznGeRu4s9Fmxl8PthpxOh5CQ0eqjqw1Q8ScgNA1moQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const highlightThumbnail = (index) => {
      const thumbnails = document.querySelectorAll('.thumbnail-swiper .swiper-slide img');
      thumbnails.forEach((thumb, i) => {
      if (i === index) {
        thumb.style.border = `2px solid var(--primary-color)`;
        thumb.style.opacity = '1';
      } else {
        thumb.style.border = '2px solid transparent';
        thumb.style.opacity = '0.7';
      }
      });
    };

    // Main product image swiper
    const mainSwiper = new Swiper('.product-gallery .swiper-container:first-child', {
      loop: true,
      speed: 500,
      autoplay: {
      delay: 5000,
      disableOnInteraction: false,
      },
      effect: 'fade',
      fadeEffect: {
      crossFade: true
      },
      navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
      },
      on: {
      slideChange: function () {
        highlightThumbnail(this.realIndex);
      }
      }
    });

    // Thumbnail swiper
    const thumbSwiper = new Swiper('.thumbnail-swiper', {
      slidesPerView: 4,
      spaceBetween: 10,
      freeMode: true,
      watchSlidesProgress: true,
      breakpoints: {
      480: {
        slidesPerView: 5,
      },
      768: {
        slidesPerView: 4,
      }
      }
    });

    // Link the two swipers
    mainSwiper.controller.control = thumbSwiper;
    thumbSwiper.controller.control = mainSwiper;

    // Highlight initial thumbnail
    highlightThumbnail(0);

    // Click functionality for thumbnails
    const thumbnails = document.querySelectorAll('.thumbnail-swiper .swiper-slide');
    thumbnails.forEach((thumb, index) => {
      thumb.addEventListener('click', () => {
      mainSwiper.slideTo(index);
      highlightThumbnail(index);
      });
    });

    // Related products slider
    const relatedProductsSwiper = new Swiper('.related-products', {
      slidesPerView: 1,
      spaceBetween: 20,
      grabCursor: true,
      pagination: {
      el: '.swiper-pagination',
      clickable: true,
      },
      autoplay: {
      delay: 3000,
      disableOnInteraction: false,
      },
      breakpoints: {
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
      },
    });

    // Review stars interaction
    const reviewStars = document.querySelectorAll('#reviews .fa-star-o');
    let currentRating = 0;

    reviewStars.forEach((star, index) => {
      star.addEventListener('mouseover', () => {
      for (let i = 0; i <= index; i++) {
        reviewStars[i].classList.remove('fa-star-o');
        reviewStars[i].classList.add('fa-star');
      }
      });

      star.addEventListener('mouseout', () => {
      reviewStars.forEach((s, i) => {
        if (i < currentRating) {
        s.classList.remove('fa-star-o');
        s.classList.add('fa-star');
        } else {
        s.classList.remove('fa-star');
        s.classList.add('fa-star-o');
        }
      });
      });

      star.addEventListener('click', () => {
      currentRating = index + 1;
      for (let i = 0; i <= index; i++) {
        reviewStars[i].classList.remove('fa-star-o');
        reviewStars[i].classList.add('fa-star');
      }
      for (let i = index + 1; i < reviewStars.length; i++) {
        reviewStars[i].classList.remove('fa-star');
        reviewStars[i].classList.add('fa-star-o');
      }
      });
    });

    const qtyInput = document.querySelector('input[name="quantity"]');
    const reduceBtn = document.querySelector('.qty-control__reduce');
    const increaseBtn = document.querySelector('.qty-control__increase');

    if (reduceBtn && increaseBtn && qtyInput) {
      reduceBtn.addEventListener('click', () => {
      const currentValue = parseInt(qtyInput.value);
      if (currentValue > 1) {
        qtyInput.value = currentValue - 1;
      }
      });

      increaseBtn.addEventListener('click', () => {
      const currentValue = parseInt(qtyInput.value);
      qtyInput.value = currentValue + 1;
      });

      qtyInput.addEventListener('change', function () {
      if (this.value < 1 || isNaN(this.value)) {
        this.value = 1;
      }
      });
    }

    const tabButtons = document.querySelectorAll('#productTabs .nav-link');
    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
      tabButtons.forEach(btn => {
        btn.style.borderBottom = '2px solid transparent';
      });
      if (button.classList.contains('active')) {
        button.style.borderBottom = '2px solid var(--primary-color)';
      }
      });
    });
    document.querySelector('#productTabs .nav-link.active').style.borderBottom = '2px solid var(--primary-color)';
    });
  </script>
@endpush