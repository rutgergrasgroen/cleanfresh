var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('admin.scss');
    mix.copy('bower_components/bootstrap/dist/fonts', 'public/assets/fonts');
   	mix.copy('bower_components/font-awesome/fonts', 'public/assets/fonts');
   	mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/font-awesome/css/font-awesome.css',
        'bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css',
        'public/css/admin.css'
    ], 'public/assets/css/admin.css', './');
    mix.scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'bower_components/Chart.js/dist/Chart.js',
        'bower_components/metisMenu/dist/metisMenu.js',
        'bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js',
    ], 'public/assets/js/admin.js', './');
});


