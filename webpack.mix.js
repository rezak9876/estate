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

// mix.js('resources/vueadmin/app.js', 'public/js')
//  .postCss('resources/css/app.css', 'public/css', [
//      //
//  ]);

mix.js('resources/vueadmin/app.js', 'public/js/admin')
    .sourceMaps()
    .vue();

mix.js('node_modules/leaflet/dist/leaflet.js', 'public/packages/leaflet')
    .postCss('node_modules/leaflet/dist/leaflet.css', 'public/packages/leaflet')


if (mix.inProduction()) {
    mix.version();
}
    // .browserSync(process.env.APP_URL);
