const mix = require('laravel-mix');
const path = require('path');

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
    .vue({
        extractStyles: true,
        globalStyles: false,
        version: 3,
    })
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    // .copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css/bootstrap.css')
    .postCss('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css/bootstrap.css','bootstrap-vue/dist/bootstrap-vue.css');
    mix.webpackConfig({
        resolve: {
            extensions: ['.js', '.vue'],
            alias: {
                '@': path.resolve('resources/js'),
                'vue$': 'vue/dist/vue.esm-bundler.js',
            },
        }
    });
