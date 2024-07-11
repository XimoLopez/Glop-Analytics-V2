import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: {
                "app.css": "resources/css/app.css",
                "app.js": "resources/js/app.js",

                "admin.css": "resources/css/admin.css",
                "admin.js": "resources/js/admin.js",

                "styles.css": "resources/scss/styles.scss",
                "main.js": "resources/js/main.js",
            },
            refresh: true,
        }),
    ],
});
