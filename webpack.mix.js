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
    .js('resources/js/_ajaxfavorite.js', 'public/js')
    .autoload({ "jquery": ['$', 'window.jQuery'] })
    .postCss('resources/css/love.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])

// mix.js('resources/js/app.js', 'public/js')
//     .js('resources/js/_ajaxfavorite.js', 'public/js')
//     .autoload({ "jquery": ['$', 'window.jQuery'] })
//     .sass('resources/sass/app.scss', 'public/css')
//     .options({
//         postCss: [
//             require('postcss-import'),
//             require('tailwindcss'),
//         ]
//     });
.sass('resources/sass/app.scss', 'public/css');
if (mix.inProduction()) {
    mix.version();
}
