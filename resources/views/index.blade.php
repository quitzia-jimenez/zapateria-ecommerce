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
          <a href="#" class="btn btn-primary">Comprar ahora</a>
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
              <i class="fas fa-truck"></i>
            </div>
            <h4 class="feature-title">Envío gratuito</h4>
            <p>En todas las compras superiores a $999</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fas fa-undo"></i>
            </div>
            <h4 class="feature-title">Devoluciones fáciles</h4>
            <p>30 días para cambios y devoluciones</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fas fa-headset"></i>
            </div>
            <h4 class="feature-title">Soporte 24/7</h4>
            <p>Atención al cliente siempre disponible</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Products -->
  <section class="popular-products">
    <div class="container">
      <div class="section-title">
        <h2>Productos populares</h2>
      </div>
      <div class="row">
        <!-- Product 1 -->
        <div class="col-md-3">
          <div class="product-card">
            <div class="product-img">
              <img src="https://florsheimshoes.com.mx/wp-content/uploads/2022/10/00046pri.jpg" alt="Zapato casual">
              <div class="product-overlay">
                <div class="product-options">
                  <a href="#"><i class="fas fa-eye"></i></a>
                  <a href="#"><i class="fas fa-heart"></i></a>
                  <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
            <div class="product-body">
              <h5 class="product-title">Zapato casual elegante</h5>
              <p class="product-price">$1,299.00</p>
            </div>
          </div>
        </div>
        <!-- Product 2 -->
        <div class="col-md-3">
          <div class="product-card">
            <div class="product-img">
              <img src="https://www.varugu.com/cdn/shop/files/tenis-zapatos-formales.jpg?v=1722296599&width=1445"
                alt="Zapato deportivo">
              <div class="product-overlay">
                <div class="product-options">
                  <a href="#"><i class="fas fa-eye"></i></a>
                  <a href="#"><i class="fas fa-heart"></i></a>
                  <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
            <div class="product-body">
              <h5 class="product-title">Tenis deportivo ligero</h5>
              <p class="product-price">$999.00</p>
            </div>
          </div>
        </div>
        <!-- Product 3 -->
        <div class="col-md-3">
          <div class="product-card">
            <div class="product-img">
              <img src="https://arantzaonline.com/cdn/shop/files/040316_7.jpg?v=1713826676" alt="Zapato formal">
              <div class="product-overlay">
                <div class="product-options">
                  <a href="#"><i class="fas fa-eye"></i></a>
                  <a href="#"><i class="fas fa-heart"></i></a>
                  <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
            <div class="product-body">
              <h5 class="product-title">Zapato formal de piel</h5>
              <p class="product-price">$1,499.00</p>
            </div>
          </div>
        </div>
        <!-- Product 4 -->
        <div class="col-md-3">
          <div class="product-card">
            <div class="product-img">
              <img src="https://http2.mlstatic.com/D_NQ_NP_995342-MLM78769631922_092024-O.webp" alt="Zapato de moda">
              <div class="product-overlay">
                <div class="product-options">
                  <a href="#"><i class="fas fa-eye"></i></a>
                  <a href="#"><i class="fas fa-heart"></i></a>
                  <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
            <div class="product-body">
              <h5 class="product-title">Zapatilla urbana trendy</h5>
              <p class="product-price">$1,199.00</p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <a href="#" class="btn btn-primary">Ver Más Productos</a>
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
        <!-- Category 1 -->
        <div class="col-md-4">
          <div class="category-card">
            <img
              src="https://fredzapaterias.com.mx/cdn/shop/collections/zapatos-de-vestir-hombre-casuales-flexi-quirelli-brantano-lobo-solo-gino-compra-online-zapateria-fred-precio-flexi-tienda-compra-aqui_1200x1200.webp?v=1699030754"
              alt="Hombres" class="category-img">
            <div class="category-overlay">
              <h3 class="category-name">Hombres</h3>
              <a href="#" class="category-btn">Ver Colección</a>
            </div>
          </div>
        </div>
        <!-- Category 2 -->
        <div class="col-md-4">
          <div class="category-card">
            <img src="https://just-ene.com/cdn/shop/articles/zapatos-de-mujer-comodos-y-elegantes_800x.png?v=1675073357"
              alt="Mujeres" class="category-img">
            <div class="category-overlay">
              <h3 class="category-name">Mujeres</h3>
              <a href="#" class="category-btn">Ver Colección</a>
            </div>
          </div>
        </div>
        <!-- Category 3 -->
        <div class="col-md-4">
          <div class="category-card">
            <img src="https://podologiaelenagarcia.com/wp-content/uploads/2019/06/Zapato-infantil.jpg" alt="Niños"
              class="category-img">
            <div class="category-overlay">
              <h3 class="category-name">Niños</h3>
              <a href="#" class="category-btn">Ver Colección</a>
            </div>
          </div>
        </div>
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
                <h5>Ana García</h5>
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