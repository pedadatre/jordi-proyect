import React from 'react';
import { createRoot } from 'react-dom/client'; // Importa createRoot desde react-dom/client
import WelcomePage from './components/WelcomePage'; // Importa el componente WelcomePage

// Selecciona el contenedor donde se renderizará la aplicación
const container = document.getElementById('root');

// Crea una raíz para renderizar la aplicación
const root = createRoot(container);

// Renderiza el componente WelcomePage dentro de React.StrictMode
root.render(
  <React.StrictMode>
    <WelcomePage />
  </React.StrictMode>
);