const path = require('path');
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
 
mix
	.options({
        processCssUrls: false,
    })
    .sass('src/scss/build.scss', 'dist/css/style.css', {
        includePaths: [path.resolve(__dirname, 'node_modules')]
    })
    
    .sass('src/scss/style-light.scss', 'dist/css', {
        includePaths: [path.resolve(__dirname, 'node_modules')]
    })
    .sass('src/scss/style-dark.scss', 'dist/css', {
        includePaths: [path.resolve(__dirname, 'node_modules')]
    })
    .copy('src/js/utils.js', 'dist/js/libs')
    .copy('src/js/intlTelInput.js', 'dist/js/libs')
    .js('src/js/build.js', 'dist/js/script.js')
    .browserSync({
        proxy: 'kaymera.test',
        files: ["dist/css", "dist/js", "*.php", "inc"]
    });