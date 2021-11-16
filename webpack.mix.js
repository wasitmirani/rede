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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/frontend/frontend.js', 'public/js')
    .js('resources/js/frontend/sort.js', 'public/js')
    .js('resources/js/frontend/sortable.js', 'public/js')
    .js('resources/js/frontend/st.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')





const path_css = "resources/assets/css";
mix.styles([
    `${path_css+'/all.min.css'}`,
    `${path_css+'/bootstrap.min.css'}`,
    `${path_css+'/fancybox.css'}`,
    `${path_css+'/fontawesome.css'}`,
    `${path_css+'/slick-theme.css'}`,
    `${path_css+'/style.css'}`,
], 'public/css/style.css');



const path_js = "resources/assets/js";
mix.scripts([
    `${path_js+'/bootstrap.bundle.min.js'}`,
    `${path_js+'/bootstrap.min.js'}`,
    `${path_js+'/custom.js'}`,
    `${path_js+'/fancybox.js'}`,
    `${path_js+'/fontawesome.js'}`,
    `${path_js+'/popper.min.js'}`,
    `${path_js+'/slick.min.js'}`,
    `${path_js+'/slim.min.js'}`

], 'public/js/custom.js');
