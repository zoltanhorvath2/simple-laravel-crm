const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css', [

    ]);
mix.copy('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js', 'public/vendor/plugins/jquery/jquery.min.js');
mix.copy('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js');
mix.copy('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css', 'public/vendor/plugins/fontawesome-free/css/all.min.css')
