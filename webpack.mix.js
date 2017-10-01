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

mix.sass('resources/assets/sass/style.scss', 'public/css')
.options({
     processCssUrls: false
 });


mix.styles([

 'resources/assets/css/bootstrap.css',
 'resources/assets/css/dark.css',
 'resources/assets/css/swiper.css',
 'resources/assets/css/font-icons.css',
 'resources/assets/css/animate.css',
 'resources/assets/css/magnific-popup.css',
 'resources/assets/css/responsive.css'

], 'public/css/bundle.css');

mix.scripts([

 'resources/assets/js/jquery.js',
 'resources/assets/js/plugins.js',
 'resources/assets/js/functions.js',
 'resources/assets/js/app.js'

], 'public/js/script.js');