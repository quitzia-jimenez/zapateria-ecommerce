<!DOCTYPE html>
<html lang="es">

<head>
  <title>BOMU - Zapatos con Estilo</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="{{ asset('recursos/user/img/shoes.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
  
  <link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/index.css')}}">
  @yield('styles')

</head>

<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">
          <img src="{{ asset('recursos/user/img/bomu-logo.png') }}" alt="BOMU Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{route('home.index')}}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('home.nosotros') ? 'active' : '' }}" href="{{route('home.nosotros')}}">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('home.contact') ? 'active' : '' }}" href="{{route('home.contact')}}">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('shop.index') ? 'active' : '' }}" href="{{route('shop.index')}}">Catalogo</a>
            </li>
          </ul>
          <div class="navbar-icons">
            <a href="#"><i class="fas fa-search"></i></a>

            @guest
            <a href="{{route('login')}}"><i class="fas fa-user"></i></a>
            @else
            <a href="{{Auth::user()->untype === 'ADM' ? route('admin.index') : route('user.index')}}"><i class="fas fa-user"></i></a>
            <span>{{Auth::user()->name}}</span>
            @endguest

            <a href="{{route('wishlist.index')}}"><i class="fas fa-heart"></i>
              @if(Cart::instance('wishlist')->count() > 0)
              <span class="cart-ammount d-block position-absolute js-cart-items-count">{{ Cart::instance('wishlist')->count() }}</span>
              @endif
          </a>


            <a href="{{route('cart.index')}}"><i class="fas fa-shopping-cart"></i>
              @if (Cart::instance('cart')->count() > 0)
              <span class="cart-ammount d-block position-absolute js-cart-items-count">{{Cart::instance('cart')->count()}}</span>
              @endif
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="page-content">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer id="footer" class="mt-5" style="background-color:rgba(215, 105, 164, 0.64);">
    <div class="container">
      <div class="row d-flex flex-wrap justify-content-between py-5">
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-001">
            <div class="footer-intro mb-4">
              <a href="{{route('home.index')}}">
                <img src="{{ asset('recursos/user/img/logo-blanco.png') }}" alt="logo">
              </a>
            </div>
            <p style="color: white">En BOMU, creemos que cada paso cuenta.¡Compra fácil, rápido y con la confianza de
              que en BOMU caminamos contigo! </p>
            <div class="social-links">
              <ul class="list-unstyled d-flex flex-wrap gap-3">
                <li><a
                    href="https://www.facebook.com/BOMUZapateria?rdid=BJh330HYoqCBQHy5&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F15cQtpjW4R%2F#"
                    class="text-secondary" style="color: white"><i class="fab fa-facebook-f"></i></a></li>
                <!-- <li><a href="#" class="text-secondary" style="color: white"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="text-secondary" style="color: white"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#" class="text-secondary" style="color: white"><i class="fab fa-pinterest"></i></a></li> -->
                <li><a
                    href="https://www.instagram.com/bomu_zapateria?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                    class="text-secondary" style="color: white"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-002">
            <h5 class="widget-title text-uppercase mb-4" style="color: white">Todos los Links</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              <li class="menu-item">
                <a href="{{route('home.index')}}" class="item-anchor" style="color: white">Principal</a>
              </li>
              <li class="menu-item">
                <a href="{{route('shop.index')}}" class="item-anchor" style="color: white">Catalogo</a>
              </li>
              <li class="menu-item">
                <a href="{{route('home.nosotros')}}" class="item-anchor" style="color: white">Nosotros</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-003">
            <h5 class="widget-title text-uppercase mb-4" style="color: white">Ayuda e Información</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              <li class="menu-item">
                <a href="#" class="item-anchor" style="color: white">Entrega de orden</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor" style="color: white">Retornos y cambios</a>
              </li>
              <li class="menu-item">
                <a href="{{route('home.contact')}}" class="item-anchor" style="color: white">Contactanos</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-004 border-animation-left">
            <h5 class="widget-title text-uppercase mb-4" style="color: white">Contactanos</h5>
            <p style="color: white">¿Tienes alguna sugerencia? <a href="bomu-zapaterias@gmail.com"
                class="item-anchor">bomu-zapaterias@gmail.com</a></p>
            <p style="color: white">¿Necesitas ayuda? Comunicate con nosotros <a href="tel:+52 246 149 8823"
                class="item-anchor">+52 246 149 8823</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
  <script src="{{asset('recursos/user/js/indexjs.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  {{-- @yield('scripts') --}}

  @stack('scripts')
  
</body>
</html>