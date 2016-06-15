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
   	mix.copy('bower_components/raphael/raphael.min.js', 'public/assets/js');
    mix.copy('bower_components/morrisjs/morris.min.js', 'public/assets/js');
   	mix.styles([
        'public/css/admin.css',
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/font-awesome/css/font-awesome.css',
        'bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css',
        'bower_components/startbootstrap-sb-admin-2/dist/css/timeline.css',
        'bower_components/morrisjs/morris.css',
    ], 'public/assets/css/admin.css', './');
    mix.scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/jquery-ui/jquery-ui.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'resources/assets/js/jquery.mjs.nestedSortable.js',
        'bower_components/Chart.js/dist/Chart.js',
        'bower_components/metisMenu/dist/metisMenu.js',
        'bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js',
        'bower_components/bootbox.js/bootbox.js',
        'resources/assets/js/admin.js'
    ], 'public/assets/js/admin.js', './');
});


