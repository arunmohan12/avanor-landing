import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/landing/aldar-new.js',
                'resources/css/landing/aldar-new.css',
            ],
            refresh: true,
         
        }),
        tailwindcss(),
    ],

    build: {
        outDir: 'public/build-dev',
        emptyOutDir: true,
        manifest: true,
    },

    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});