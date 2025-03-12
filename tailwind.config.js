/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: "1rem",
                sm: "0rem",
                lg: "2rem",
                xl: "3rem",
                "2xl": "4rem",
            },
            // Tambahkan opsi `center` untuk margin auto
            center: true,
            dropShadow: {
                "1xl": "0 10px 20px rgba(0, 0, 0, 0.15)", // Light shadow for minimal depth
                "2xl": "0 20px 30px rgba(0, 0, 0, 0.2)", // More noticeable shadow
                "3xl": "0 30px 40px rgba(0, 0, 0, 0.25)", // Deep shadow for significant depth
                "4xl": [
                    "0 30px 50px rgba(0, 0, 0, 0.3)", // Stronger shadow with more blur
                    "0 40px 70px rgba(0, 0, 0, 0.2)", // Additional shadow for greater depth
                ],
            },
        },
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
