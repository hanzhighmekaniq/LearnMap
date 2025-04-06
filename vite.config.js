import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    // // RUN DI MOBILE
    // server: {
    //     host: '0.0.0.0',       // Akses dari HP bisa
    //     port: 5173,            // Default Vite port
    //     strictPort: true,
    //     hmr: {
    //         host: '192.168.1.4' // IP MENYESUAIKAN laptop kamu
    //     }
    // },
});
