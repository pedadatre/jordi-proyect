document.addEventListener('DOMContentLoaded', function () {
    const title = document.querySelector('h1.fade-in');
    const cards = document.querySelectorAll('.crew-card');

    // Fade in title
    setTimeout(() => {
        title.classList.add('visible');
    }, 100);

    // Intersection Observer for cards
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        observer.observe(card);

        // Spotlight effect
        const spotlight = card.querySelector('.spotlight');
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            spotlight.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 80%)`;
        });
    });
});
