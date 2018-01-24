var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.sass('app.scss');


    mix.styles([
        'vendor/bootstrap.min.css',
        'vendor/datepicker.css',
        'vendor/buttons.css',
        'style/style.css',
        'style/custom.css',
        'style/table.css',
        'style/table_black.css'
    ],'public/css/styles.css'); //3rd arg loc: def resources/assets


    mix.scripts([
        'vendor/jquery-1.11.3.min.js',
        'vendor/bootstrap.min.js',
        'vendor/typed.js',
        'vendor/datepicker.js',
        'scripts.js'
    ],'public/js/scripts.js')

    mix.version('public/css/styles.css'); //build cached file

});
