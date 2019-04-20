const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
    'public/css/bootstrap-4.3.min.css',
    'public/css/flexslider.css',
    'public/css/fancySelect.css',
    'public/css/animate.css',
    'public/css/style.css',
    'public/css/jquery.fancybox.css',
    'public/font-awesome/css/font-awesome.css',
], 'public/css/all.css')
   .scripts([
    'public/js/jquery-3.3.1.slim.min.js',
    'public/js/popper.min.js',
    'public/js/jquery-ui.min.js',
    'public/js/dirPagination.js',
    'public/js/productCtrl.js',
    'public/js/toArrayFilter.js',
    'public/js/bootstrap-4.3.min.js',
    'public/js/superfish.min.js',
    'public/js/jquery.sticky.js',
    'public/js/parallax.js',
    'public/js/jquery.flexslider-min.js',
    'public/js/jquery.jcarousel.js',
    'public/js/fancySelect.js',
    'public/js/animate.js',
    'public/js/myscript.js',
    'public/js/customjs.js',
    'public/js/jquery.fancybox.js',
], 'public/js/all.js');
