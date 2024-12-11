document.addEventListener('DOMContentLoaded', function() {
    // Inicializar el carrusel
    $('.carousel').carousel({
        interval: 5000
    });

    // Smooth scroll para los enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Animación para las tarjetas de eventos
    const eventCards = document.querySelectorAll('#eventos .card');
    eventCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-10px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });

    // Efecto parallax para las secciones con fondo fijo
    window.addEventListener('scroll', function() {
        var scrolled = window.scrollY;
        var parallax = document.getElementsByClassName("parallax-section");
        Array.prototype.forEach.call(parallax, function(el, i) {
            var limit = el.offsetTop + el.offsetHeight;
            if (scrolled > el.offsetTop && scrolled <= limit) {
                el.style.backgroundPositionY = (scrolled - el.offsetTop) / 1.5 + "px";
            } else {
                el.style.backgroundPositionY = "0";
            }
        });
    });
});