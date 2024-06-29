const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        // './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        // './storage/framework/views/*.php',
        // './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                body: ["Kanit", "Noto Sans JP", "sans-serif"],
            },
            colors: {
                body: "#d1b5b4",
                // brown: "#4f342c",
                "pastel-pink": "#f9ece4",
                brown: {
                    100: '#d3b58d',
                    200: '#bc8f8f',
                    300: '#9f512d',
                    400: '#7b5544',
                    500: '#4f342c',
                  },
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
