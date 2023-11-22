const mix = require('laravel-mix');
mix.setPublicPath('dist');
mix.setResourceRoot('../');
mix.autoload({
   jquery: ['$', 'jQuery', 'window.jQuery']
});
mix.copyDirectory('resources/assets/images', 'dist/images');
mix.js('resources/assets/js/theme.js', 'dist/js')
   .sass('resources/assets/scss/theme.scss', 'dist/css')
   .sass('resources/assets/scss/editor/editor.scss', 'dist/css/theme-editor.css')
   .sass('resources/assets/scss/home/general.scss', 'dist/css/general.css')
   .sass('resources/assets/scss/home/charity.scss', 'dist/css/charity.css')
   .sass('resources/assets/scss/home/dream.scss', 'dist/css/dream.css')
   .sass('resources/assets/scss/home/ngo-dark.scss', 'dist/css/ngo-dark.css')
   .sass('resources/assets/scss/home/ngo.scss', 'dist/css/ngo.css')
   .sass('resources/assets/scss/home/organization.scss', 'dist/css/organization.css')
   .sass('resources/assets/scss/home/water-charity.scss', 'dist/css/water-charity.css')
   .sass('resources/assets/scss/home/water.scss', 'dist/css/water.css')
   .sass('resources/assets/scss/home/charity-new.scss', 'dist/css/charity-new.css')
   .sass('resources/assets/scss/home/charity-organization.scss', 'dist/css/charity-organization.css')
   .sass('resources/assets/scss/home/earthquake.scss', 'dist/css/earthquake.css')
   .extract()
   .version();
