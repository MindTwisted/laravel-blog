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

mix.autoload({
    // Code below needs to run bootstrap 4
    jquery: ['$', 'jQuery', 'window.jQuery'],
    'exports-loader?Util!bootstrap/js/dist/util': ['Util'],
    'popper.js/dist/umd/popper.js': ['Popper']
});

mix.js('resources/home/static/js/index.js', 'public/js/home.js')
    .js('resources/site/static/js/index.js', 'public/js/site.js')
    .sass('resources/home/static/sass/index.scss', 'public/css/home.css')
    .sass('resources/site/static/sass/index.scss', 'public/css/site.css');

mix.browserSync({
    proxy: 'homestead.app',
    open: false,
    files: [
        'app/**/*.php',
        'resources/**/*.php',
        'public/js/**/*.js',
        'public/css/**/*.css'
    ],
});

mix.disableNotifications();