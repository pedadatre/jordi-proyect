document.addEventListener('DOMContentLoaded', function() {
    const sliderContainer = document.querySelector('.slider-container');
    const sliderNav = document.querySelector('.slider-nav');
    const slides = document.querySelectorAll('.slider-item');
    let currentIndex = 0;

    // Crear los puntos de navegación
    slides.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('slider-nav-item');
        dot.addEventListener('click', () => goToSlide(index));
        sliderNav.appendChild(dot);
    });

    function updateSlider() {
        sliderContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
        document.querySelectorAll('.slider-nav-item').forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function goToSlide(index) {
        currentIndex = index;
        updateSlider();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    }

    // Iniciar el slider
    updateSlider();
    
    // Cambiar de slide cada 5 segundos
    setInterval(nextSlide, 5000);
});