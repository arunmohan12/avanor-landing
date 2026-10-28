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
                'resources/css/landing/wadeem.css',
                'resources/css/landing/yas-riva.css',
                'resources/css/landing/wadeemv2.css',
                'resources/css/landing/ghadeer-parks.css',
                'resources/css/landing/riverside.css',
                'resources/css/landing/the-heightsv2.css',
                'resources/css/landing/mareva.css',
                'resources/css/landing/aldar-new.css',

                'resources/js/landing/the-heights.js',
                'resources/js/landing/wadeem.js',
                'resources/js/landing/yas-riva.js',
                'resources/js/landing/bay-estate.js',
                'resources/js/landing/ghadeer-parks.js',
                 'resources/js/landing/riverside.js',
                  'resources/js/landing/the-heights.js',
                  'resources/js/landing/mareva.js',
                  'resources/js/landing/aldar-new.js',
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
