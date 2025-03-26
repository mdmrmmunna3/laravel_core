import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],  // Include CSS and JS files for Vite to process
            refresh: true,
        }),
    ],
    server: {
        host: 'localhost',   // Ensure the Vite dev server runs on localhost
        port: 3000,          // Adjust if necessary
    },
});
