const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Dependencias do website
mix.js('resources/assets/js/website.js', 'public/js')
   .sass('resources/assets/sass/website/website.scss', 'public/css');

// Dependencias do CMS
mix.js('resources/assets/js/dashboard.js', 'public/js')
    .sass('resources/assets/sass/dashboard/dashboard.scss', 'public/css');