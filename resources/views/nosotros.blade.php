@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/nosotroscss.css')}}">

@endsection 

@section('content')
<!-- About Hero Section-->
<section class="about-hero-section">
    <div class="container">
        <div class="about-hero-content">
            <h1>Nuestra historia</h1>
            <p>Conoce quiénes somos y por qué somos tu mejor opción en calzado</p>
        </div>
    </div>
</section>

<!-- About Us Content -->
<section class="about-content">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        alt="Nuestra Historia" class="img-fluid rounded shadow">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-text">
                    <h2>¿Quiénes somos?</h2>
                    <p>BOMU nació en 2015 con una misión clara: revolucionar la industria del calzado combinando
                        diseño, calidad y confort a precios accesibles. Desde entonces, hemos crecido hasta
                        convertirnos en una de las marcas de calzado más reconocidas del país.</p>
                    <p>Nuestro compromiso es crear zapatos que no solo se vean bien, sino que también se sientan
                        bien. Utilizamos materiales de alta calidad y técnicas de fabricación avanzadas para
                        garantizar la durabilidad y comodidad de cada par.</p>
                    <p>En BOMU creemos que cada paso cuenta, y por eso nos esforzamos en ofrecer productos que
                        acompañen a nuestros clientes en cada momento de sus vidas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values Section -->
<section class="values-section">
    <div class="container">
        <div class="section-title text-center">
            <h2>Nuestros valores</h2>
            <p>Principios que guían cada paso que damos</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Pasión</h4>
                    <p>Amamos lo que hacemos y eso se refleja en cada detalle de nuestros productos.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Calidad</h4>
                    <p>Utilizamos los mejores materiales y procesos para garantizar productos duraderos.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4>Sostenibilidad</h4>
                    <p>Nos comprometemos con prácticas responsables con el medio ambiente.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team Section -->
<section class="team-section">
    <div class="container">
        <div class="section-title text-center">
            <h2>Nuestro equipo</h2>
            <p>Personas apasionadas que hacen posible BOMU</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-img">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg alt="Miembro del equipo"
                            class="img-fluid">
                        <div class="social-media">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Brenda Roldán Muñóz</h5>
                        <span>Dueña</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-img">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Miembro del equipo"
                            class="img-fluid">
                        <div class="social-media">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Jessica Paredes Hernandez</h5>
                        <span>NO SE SU ROL</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-img">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Miembro del equipo"
                            class="img-fluid">
                        <div class="social-media">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Germán Islas Sánchez</h5>
                        <span>NO SE QUE PUESTO</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-img">
                        <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Miembro del equipo"
                            class="img-fluid">
                        <div class="social-media">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Karen Garcia Tlapale</h5>
                        <span>Marketing</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Counter Section -->
<section class="counter-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <div class="counter-number">
                        <span class="counter">8</span>+
                    </div>
                    <h5>Años de experiencia</h5>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <div class="counter-number">
                        <span class="counter">50</span>k+
                    </div>
                    <h5>Clientes satisfechos</h5>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <div class="counter-number">
                        <span class="counter">200</span>+
                    </div>
                    <h5>Estilos de calzado</h5>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <div class="counter-number">
                        <span class="counter">15</span>
                    </div>
                    <h5>Tiendas en México</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brands Section -->
<section class="brands-section">
    <div class="container">
        <div class="section-title text-center">
            <h2>Nuestros proveedores</h2>
            <p>Trabajamos con los mejores para ofrecerte calidad</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="brands-slider">
                    <div class="brand-item">
                        <img src="https://images.seeklogo.com/logo-png/9/1/nike-logo-png_seeklogo-99478.png" alt="Marca 1">
                    </div>
                    <div class="brand-item">
                        <img src="https://logowik.com/content/uploads/images/puma.jpg" alt="Marca 2">
                    </div>
                    <div class="brand-item">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Vans-logo.svg/2560px-Vans-logo.svg.png" alt="Marca 3">
                    </div>
                    <div class="brand-item">
                        <img src="https://logowik.com/content/uploads/images/342_jordan.jpg" alt="Marca 4">
                    </div>
                    <div class="brand-item">
                        <img src="https://cdn.freebiesupply.com/logos/large/2x/dior-logo-png-transparent.png" alt="Marca 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2>¿Listo para estrenar un nuevo par?</h2>
                <p>Descubre nuestra colección y encuentra el calzado perfecto para cada ocasión.</p>
                <a href="{{route('shop.index')}}" class="btn btn-primary">Ver Catálogo</a>
            </div>
        </div>
    </div>
</section>




@endsection



