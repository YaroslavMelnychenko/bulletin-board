const mix = require('laravel-mix');

const autoprefixer = require('autoprefixer');
const sortMediaQueries = require('postcss-sort-media-queries');

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

mix.js('resources/vue/app.js', 'public/js')
   .extract([
      'axios',
      'vue',
      'vue-router'
   ])
   .sourceMaps()
   .version()
   .sass('resources/vue/app.sass', 'public/css')
   .options({
      postCss: [
         autoprefixer({
            grid: true
         }),
         sortMediaQueries()
      ]
   })
   .version();