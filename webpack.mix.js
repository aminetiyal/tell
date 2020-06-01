const mix = require('laravel-mix');
const webpack = require('webpack');
const tailwindcss = require('tailwindcss');
const postcss = require('postcss-purgecss-laravel')({})

mix.options({
    uglify: {
        uglifyOptions: {
            compress: {
                drop_console: true,
            }
        }
    },
    processCssUrls: false,
})
    .webpackConfig({
        plugins: [
            new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
        ],
    });

//mix.js('resources/vue/main.js', 'public/js');
//mix.sass('resources/sass/app.scss', 'public/css');

mix
    .setPublicPath('public')
    .js('resources/vue/main.js', 'public/js')
    .postCss('resources/sass/tailwind.css', 'public/css')
    .options({
        postCss: [
            tailwindcss,
            ...process.env.NODE_ENV === 'production'
                ? [postcss]
                : []
        ]
    })
    .version()
    .copy('public', '../../aminetiyal/public/vendor/tell');