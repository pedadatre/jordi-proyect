@extends('layouts.app')

@section('title', 'Inicio - Nuestras Peñas')

@section('meta_description', 'Descubre la diversión y la tradición de nuestras peñas en la Vall d\'Uxó.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <div class="container-fluid p-0">
        <!-- Carrusel -->
        <div id="mainCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mainCarousel" data-slide-to="1"></li>
                <li data-target="#mainCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/img10.jpg') }}" alt="Primera peña">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Bienvenido a Nuestras Peñas</h2>
                        <p>Descubre la tradición y la fiesta en la Vall d'Uxó</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/img9.jpg') }}" alt="Segunda peña">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Vive la Experiencia</h2>
                        <p>Música, baile y diversión garantizada</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/img2.jpeg') }}" alt="Tercera peña">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Únete a la Fiesta</h2>
                        <p>Forma parte de nuestra comunidad</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>

        <!-- Sección de Eventos -->
        <section id="eventos" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Próximos Eventos</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('img/img11.jpg') }}" class="card-img-top" alt="Evento 1">
                            <div class="card-body">
                                <h5 class="card-title">Fiesta de la Peña</h5>
                                <p class="card-text">Ven a disfrutar de la mejor música y ambiente en nuestra peña.</p>
                                <p class="card-text"><small class="text-muted">15 de Julio, 2023</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('img/img5.jpg') }}" class="card-img-top" alt="Evento 2">
                            <div class="card-body">
                                <h5 class="card-title">Concierto Benéfico</h5>
                                <p class="card-text">Un concierto para ayudar a nuestra comunidad. ¡No te lo pierdas!</p>
                                <p class="card-text"><small class="text-muted">22 de Julio, 2023</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('img/img6.jpg') }}" class="card-img-top" alt="Evento 3">
                            <div class="card-body">
                                <h5 class="card-title">Torneo de Fútbol</h5>
                                <p class="card-text">Participa en nuestro torneo anual de fútbol entre peñas.</p>
                                <p class="card-text"><small class="text-muted">5 de Agosto, 2023</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Secciones con fondo fijo -->
        <section class="parallax-section" id="section1">
            <div class="container">
                <h2>Nuestra Historia</h2>
                <p>Descubre la rica tradición de las peñas en la Vall d'Uxó.</p>
            </div>
        </section>

        <section class="parallax-section" id="section2">
            <div class="container">
                <h2>Nuestras Actividades</h2>
                <p>Participa en nuestros eventos y vive la experiencia de la fiesta.</p>
            </div>
        </section>

        <section class="parallax-section" id="section3">
            <div class="container">
                <div>
                    <h2>Únete a Nosotros</h2>
                </div>
                <div class="col-md-6 mx-auto">
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="tu@email.com">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea class="form-control" id="mensaje" rows="4" placeholder="Tu mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar Mensaje</button>
                </form>
                <p>Forma parte de nuestra comunidad y crea recuerdos inolvidables.</p>
            </div>
        </section>
        <section id="contacto" class="py-5 bg-light">
    
</section>
        <!-- Mapa de Google -->
        <section id="ubicacion" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Encuéntranos en la Vall d'Uxó</h2>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24385.55358777259!2d-0.2735277!3d39.8238943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd60072f33e6ef25%3A0x402af6ed72269e0!2s12600%20La%20Vall%20d'Uix%C3%B3%2C%20Castell%C3%B3n!5e0!3m2!1sen!2ses!4v1655303355396!5m2!1sen!2ses" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush