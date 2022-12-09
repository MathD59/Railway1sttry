const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Quantico', ...defaultTheme.fontFamily.sans],
            },
        colors: {
            'coral-tree': '#b27469',
            'gable-green': '#12282b',
            'roman-coffee': '#7c524d',
            'masala': '#4a3e3d',
            'bone': '#ead9ca',
            'eagle-green':'#143D48',
            'CGBlue':'#11749C',
            'downy': '#62bccf',
            'hoki': '#6584a6',
            'verdigri':'#34ADB8',
            'san-juan': '#275368',
            'oracle': '#3a6b76',
            'cardinal':'#C52A38',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
