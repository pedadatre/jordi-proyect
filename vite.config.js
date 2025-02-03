import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
export default defineConfig({
    plugins: [
        laravel({
            input: ['/public/css/app.css', 'public/js/app.js'],
            refresh: true,
        }),
        react(),
    ],
});
