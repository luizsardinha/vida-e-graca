/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./*.php",
        "./template-parts/**/*.php",
        "./templates/**/*.php",
        "./assets/js/**/*.js",
        "./src/**/*.js"
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                stone: {
                    50: '#fafafa',
                    100: '#f5f5f4',
                    200: '#e7e5e4',
                    300: '#d6d3d1',
                    400: '#a8a29e',
                    500: '#78716c',
                    600: '#57534e',
                    700: '#44403c',
                    800: '#292524',
                    900: '#1c1917',
                },
                amber: {
                    600: '#d97706',
                    700: '#b45309',
                }
            },
            fontFamily: {
                serif: ['Lora', 'serif'],
                sans: ['Inter', 'sans-serif'],
            },
        },
    },
    plugins: [],
}
