let mix = require('laravel-mix');

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

mix.js([
    'resources/assets/js/app.js',
    'resources/assets/js/jquery/jquery.validate.js',
    'resources/assets/js/jquery/jquery.cookie.js',
    'resources/assets/js/front.js'
    ], 'public/js')
   .styles([
       'resources/assets/css/animate.css',
       'public/css/all.css',
       'resources/assets/css/fontastic.css',
       'resources/assets/css/style.sea.css',
       'resources/assets/css/custom.css'
   ], 'public/css/app.css');
