<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Route::get('/', ['as' => 'home', function () {
    return view('welcome');
}]);

Route::auth();
Route::get('/home', 'HomeController@index');

Route::resource('categories.products', 'ProductsController');
Route::resource('cart', 'CartController');
Route::resource('checkout', 'BillingsController', [
	'only' => ['index', 'store']
]);
