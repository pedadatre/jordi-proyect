import React from 'react';
import { createRoot } from 'react-dom/client';
import NuestraHistoria from './components/NuestraHistoria';

document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('nuestra-historia');
    if (el) {
        const root = createRoot(el);
        root.render(<NuestraHistoria />);
    }
});