@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('recursos/user/css/contactcss.css')}}">

@endsection

@section('content')
  <!-- Contact Info Section -->
  <section class="contact-info-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Ubicación</h4>
                    <p>Av Cuauhtémoc 1102L 90300 Apizaco Centro, Mexico</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Teléfono</h4>
                    <p>+52 246 149 8823<br>Lun - Vie, 9:00 - 18:00</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p>bomu-zapaterias@gmail.com<br>Respuesta en 24 horas</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-wrapper">
                    <div class="section-title text-left">
                        <h2>Envíanos un mensaje</h2>
                        <p>¿Tienes alguna pregunta o comentario? Nos encantaría saber de ti. Completa el formulario
                            y te responderemos lo antes posible.</p>
                    </div>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="asunto" placeholder="Asunto" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="mensaje" rows="5" placeholder="Tu mensaje"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="map-wrapper">
                    <div class="section-title text-left">
                        <h2>Encuéntranos</h2>
                        <p>Visítanos en nuestra tienda principal para descubrir nuestra colección completa.</p>
                    </div>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.0332118381907!2d-98.14541882603942!3d19.410970941373698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d020229224c757%3A0xb98234f1511ef4d3!2sAv%20Cuauht%C3%A9moc%201102L%2C%20Centro%2C%2090300%20Centro%2C%20Tlax.!5e0!3m2!1ses!2smx!4v1742885164453!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-title">
            <h2>Preguntas Frecuentes</h2>
        </div>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ¿Cómo puedo realizar un seguimiento de mi pedido?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Una vez que tu pedido sea procesado, recibirás un correo electrónico con un número de
                        seguimiento. También puedes ingresar a tu cuenta en nuestro sitio web y consultar el estado
                        de tu pedido en la sección "Mis Pedidos".
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Cuánto tiempo tarda en llegar mi pedido?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        El tiempo de entrega varía según tu ubicación. Generalmente, los pedidos dentro de la ciudad
                        se entregan en 1-2 días hábiles, mientras que los envíos nacionales pueden tomar entre 3-5
                        días hábiles. Los envíos internacionales pueden tardar entre 7-14 días hábiles.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        ¿Cómo puedo hacer un cambio o devolución?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Puedes solicitar un cambio o devolución dentro de los 30 días posteriores a la recepción de
                        tu pedido. Los productos deben estar sin usar, con etiquetas originales y en su empaque
                        original. Para iniciar el proceso, contacta a nuestro servicio al cliente o visita la
                        sección "Devoluciones" en nuestro sitio web.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        ¿Tienen tiendas físicas donde pueda probar los zapatos?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Sí, contamos con varias tiendas físicas en las principales ciudades de México. Puedes
                        consultar la ubicación de nuestras tiendas en la sección "Tiendas" de nuestro sitio web o
                        contactarnos directamente para más información.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

