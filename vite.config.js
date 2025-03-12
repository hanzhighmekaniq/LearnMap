import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            // server: {
            //     host: true, // Izinkan akses dari IP
            //     port: 5173, // Port default Vite
            //     refresh: true,
            //     hmr: {
            //         host: "192.168.1.6", // Ganti dengan IP lokal server
            //     },
            // },
        }),
    ],
});
