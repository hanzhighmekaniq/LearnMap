/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: "1rem",
                sm: "1rem",
                lg: "2rem",
                xl: "3rem",
                "2xl": "0rem",
            },
            // Tambahkan opsi `center` untuk margin auto
            center: true,
        },
        extend: {},
    },
    plugins: [],
};
