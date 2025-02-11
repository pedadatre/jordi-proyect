import React from 'react';
import { createRoot } from 'react-dom/client';
import DrawComponent from './components/DrawComponent.jsx';

console.log('React está funcionando correctamente');

const drawContainer = document.getElementById('draw-container');
if (drawContainer) {
    console.log('Contenedor encontrado');
    const locations = JSON.parse(drawContainer.dataset.locations);
    const year = drawContainer.dataset.year;
    const rangeYears = JSON.parse(drawContainer.dataset.rangeYears);

    console.log('Datos:', { locations, year, rangeYears });

    // Usa createRoot para renderizar la aplicación
    const root = createRoot(drawContainer);
    root.render(
        <DrawComponent locations={locations} year={year} rangeYears={rangeYears} />
    );
} else {
    console.error('No se encontró el contenedor');
}




