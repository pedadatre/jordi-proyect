import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','public/js/app.jsx',
                'public/js/app1.jsx','public/js/nuestra-historia.jsx', ],
            refresh: true,
        }),
        react(), 
    ],
    resolve: {
        alias: {
            '@': '/public/js',
        },
    },
    build: {
        outDir: 'public/build',
        manifest: true,
    },
    server: { 
        hmr: {
            host: 'localhost',
        },
    },
});