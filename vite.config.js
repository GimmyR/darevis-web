import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/scss/appv.scss', 
                'resources/js/app.js', 
                'resources/js/appv.js'
            ],
            
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
    },    
});
