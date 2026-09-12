import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',


                'resources/css/landing/palm-jebel-ali.css',
                'resources/js/landing/palm-jebel-ali.js',
                'resources/js/map.js',

                'resources/css/landing/the-heightsv2.css',
                'resources/css/landing/privacy-policy.css',
                'resources/css/landing/terms-conditions.css',
                'resources/js/landing/the-heights.js',
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
