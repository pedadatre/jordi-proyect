@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <div class="hero">
        <img src="{{asset('img/img5.jpg')}}" alt="Imagen de portada de peñas">
        <h1>Bienvenido a Nuestras Peñas</h1>
    </div>

    <div class="slider">
        <div class="slider-container">
            <div class="slider-item"><img src="{{asset('img/img3.jpg')}}" alt="Imagen 1"></div>
            <div class="slider-item"><img src="{{asset('img/img2.jpg')}}" alt="Imagen 2"></div>
            <div class="slider-item"><img src="{{asset('img/img1.jpg')}}" alt="Imagen 3"></div>
        </div>
        <div class="slider-nav"></div>
    </div>

    <div class="content">
        <h2>Nuestras Peñas</h2>
        <p>Descubre la diversión y la tradición de nuestras peñas. Únete a nosotros en celebraciones llenas de música, baile y buena compañía.</p>
    </div>

    <section class="events">
        <div class="content">
            <h2>Próximos Eventos</h2>
            <div class="event-list">
                <div class="event-card">
                    <img src="{{asset('img/img5.jpg')}}" alt="Evento 1">
                    <div class="event-card-content">
                        <h3>Fiesta de la Peña</h3>
                        <p>Fecha: 15 de Julio, 2023</p>
                        <p>Lugar: Plaza Mayor</p>
                    </div>
                </div>
                <div class="event-card">
                    <img src="{{asset('img/img5.jpg')}}" alt="Evento 2">
                    <div class="event-card-content">
                        <h3>Concierto Benéfico</h3>
                        <p>Fecha: 22 de Julio, 2023</p>
                        <p>Lugar: Auditorio Municipal</p>
                    </div>
                </div>
                <div class="event-card">
                    <img src="{{asset('img/img5.jpg')}}" alt="Evento 3">
                    <div class="event-card-content">
                        <h3>Torneo de Fútbol</h3>
                        <p>Fecha: 5 de Agosto, 2023</p>
                        <p>Lugar: Campo de Deportes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Sobre Nosotros</h4>
                <p>Somos una asociación de peñas dedicada a fomentar la cultura y la diversión en nuestra comunidad.</p>
            </div>
            <div class="footer-section">
                <h4>Enlaces Rápidos</h4>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li><a href="#">Galería</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contacto</h4>
                <p>Email: info@nuestraspeñas.com</p>
                <p>Teléfono: (123) 456-7890</p>
                <p>Dirección: Calle Principal, 123, Ciudad</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Nuestras Peñas. Todos los derechos reservados.</p>
        </div>
    </footer>
@endsection

@section('scripts')
    <script src="{{asset('js/home.js')}}"></script>
@endsection