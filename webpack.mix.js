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

 mix.js('resources/js/app.js', 'public/frontend/js')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/frontend/js/jquery.min.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/frontend/js/bootstrap.min.js')
    .scripts('node_modules/@fortawesome/fontawesome-free/js/all.js', 'public/frontend/js/awesome.min.js')
    .sass('resources/sass/app.scss', 'public/frontend/css');
    if (mix.inProduction()) {
        mix.version();
    }
