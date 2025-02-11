import React from 'react';
import { createRoot } from 'react-dom/client';
import UserDrawComponent from './components/UserDrawComponent';

document.addEventListener('DOMContentLoaded', () => {
    const userDrawContainer = document.getElementById('user-draw-container');
    if (userDrawContainer) {
        try {
            const locations = JSON.parse(userDrawContainer.dataset.locations || '[]');
            const year = parseInt(userDrawContainer.dataset.year || new Date().getFullYear());
            const rangeYears = JSON.parse(userDrawContainer.dataset.rangeYears || '[]');
            const userCrew = JSON.parse(userDrawContainer.dataset.userCrew || 'null');

            console.log('Datos cargados:', { locations, year, rangeYears, userCrew });
            

            const root = createRoot(userDrawContainer);
            root.render(
                <React.StrictMode>
                    <UserDrawComponent 
                        locations={locations} 
                        year={year} 
                        rangeYears={rangeYears} 
                        userCrew={userCrew} 
                    />
                </React.StrictMode>
            );
        } catch (error) {
            console.error('Error al inicializar el componente:', error);
        }
    } else {
        console.error('No se encontró el contenedor para el componente de sorteo de usuario');
    }
});