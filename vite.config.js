import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: {
                // Se añaden los archivos CSS y JS de la aplicación Jetstream
                "app.css": "resources/css/app.css",
                "app.js": "resources/js/app.js",
                //Se añaden los archivos CSS y JS de la aplicación AdminLTE
                "admin.css": "resources/css/admin.css",
                "admin.js": "resources/js/admin.js",
                // Se añaden los archivos CSS y JS de la aplicación Glop Analytics
                "styles.css": "resources/scss/styles.scss",
                "main.js": "resources/js/main.js",
            },
            refresh: true,
        }),
    ],
});
