<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


//Client routes
Route::get('/cadastre-se', 'ClientController@create');
Route::post('/login', 'ClientController@login');

Route::middleware(['auth:client'])->group(function () {
	Route::get('/sair', 'ClientController@logout');
	Route::get('/painel-cliente', 'ClientController@index');
    Route::get('clients', 'ClientController@show');
    Route::apiResource('skive', 'AdController')->except([
    	'index', 'show'
	]);;

});

Route::middleware(['auth:client,admin'])->group(function() {
	Route::apiResource('clients', 'ClientController')->except([
	    'index', 'create', 'store']);
});

Route::post('contact', 'HomeController@contact');

Route::post('register', 'ClientController@store');

Route::get('/verificacao-email/{token}', 'ClientController@verifyClient');

Route::post('/forget-password', 'Auth\ForgetPasswordController@sendToken');

Route::get('/nova-senha/{token}', 'Auth\ResetPasswordController@index');
Route::put('/reset-password/{token}', 'Auth\ResetPasswordController@resetPassword');

//States and cities routes
Route::get('states', 'StateController@index');
Route::get('states/disponible', 'StateController@getDisponible');

Route::get('cities', 'CityController@index');
Route::get('cities/disponible', 'CityController@getDisponible');




Route::apiResource('categories', 'CategoryController');

Route::get('skive/', 'AdController@getByClient');
Route::get('barbadas/estado/{state}', 'AdController@showByState');
Route::get('barbadas/cidade/{city}', 'AdController@showByCity');
Route::get('skive/state/{state}', 'AdController@getByState');
Route::get('skive/city/{city}', 'AdController@getByCity');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('email-success/{token}', function() {
	return view('email-success');
});

Route::get('admin/login', 'Admin\AdminController@showLogin')->name('admin.login');
Route::post('admin/login', 'Admin\AdminController@login');

Route::middleware(['auth:admin'])->group(function () {
	Route::get('admin', 'Admin\AdminController@index');
	Route::get('admin/clients', 'ClientController@showAll');
	Route::get('admin/clientes', 'Admin\AdminClientController@index');
});


// Auth::routes();