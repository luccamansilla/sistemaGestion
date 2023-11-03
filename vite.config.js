import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/crearCliente.js",
                "resources/js/editarCliente.js",
                "resources/js/editarDominio.js",
            ],
            refresh: [...refreshPaths, "app/Livewire/**"],
        }),
    ],
});
