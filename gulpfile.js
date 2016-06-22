var elixir = require('laravel-elixir');
const bowersPath = '../../../bower_components/';
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
    mix.sass('app.scss', 'resources/assets/css/app.css')
    	.styles([
    		bowersPath + 'bootstrap/dist/css/bootstrap.css',
    		'app.css',
    	], 'public/css/app.css')
    	
    	.scripts([
    		bowersPath + 'jquery/dist/jquery.js',
    		bowersPath + 'bootstrap/dist/js/bootstrap.js',
    	], 'public/js/app.js')

    	.styles([
    		bowersPath + 'sweetalert/dist/sweetalert.css',
    	], 'public/css/flash.css')

    	.scripts([
    		bowersPath + 'sweetalert/dist/sweetalert-dev.js',
    	], 'public/js/flash.js')

    	.version([
    		'public/js/app.js',
    		'public/css/app.css',

    		'public/css/flash.css',
    		'public/js/flash.js',
    	]);
});
