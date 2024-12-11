document.addEventListener('DOMContentLoaded', function() {
    const infoButtons = document.querySelectorAll('.info-button');
    const closeSidebarButtons = document.querySelectorAll('.close-sidebar');
    const sidebar = document.querySelector('.crew-sidebar');

    infoButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const container = this.closest('.crew-card-container');
            const sidebarContent = container.querySelector('.crew-sidebar');
            
            // Copiar el contenido al sidebar fijo
            sidebar.innerHTML = sidebarContent.innerHTML;
            
            // Mostrar el sidebar
            sidebar.classList.add('active');
        });
    });

    closeSidebarButtons.forEach(button => {
        button.addEventListener('click', function() {
            sidebar.classList.remove('active');
        });
    });

    // Cerrar el sidebar al hacer clic fuera de él
    document.addEventListener('click', function(e) {
        if (!sidebar.contains(e.target) && !e.target.classList.contains('info-button')) {
            sidebar.classList.remove('active');
        }
    });
});