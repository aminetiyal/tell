const mix = require('laravel-mix');
const webpack = require('webpack');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const postcss = require('postcss-purgecss-laravel')({})

mix
    .setPublicPath('public')
    .js('resources/vue/main.js', 'public/js')
    .postCss('resources/sass/tailwind.css', 'public/css')
    .options({
        postCss: [
            tailwindcss,
            autoprefixer,
            ...process.env.NODE_ENV === 'production' ? [postcss] : []
        ]
    })
    .version()
    .copy('public', '../../aminetiyal/public/vendor/tell');