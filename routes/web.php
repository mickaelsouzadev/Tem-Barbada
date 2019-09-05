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
	Route::apiResource('clients', 'ClientController')->except([
    	'index', 'create',]);
    Route::get('clients', 'ClientController@show');
    Route::apiResource('ads', 'AdController')->except([
    	'index', 'show'
	]);;

});





//States and cities routes
Route::get('states', 'StateController@index');
Route::get('states/disponible', 'StateController@getDisponible');

Route::get('cities', 'CityController@index');
Route::get('cities/disponible', 'CityController@getDisponible');




Route::apiResource('categories', 'CategoryController');

Route::get('ads/{id}', 'AdController@getByClient');
Route::get('barbadas/estado/{state}', 'AdController@showByState');
Route::get('barbadas/cidade/{city}', 'AdController@showByCity');
Route::get('ads/state/{state}', 'AdController@getByState');
Route::get('ads/city/{city}', 'AdController@getByCity');
// Route::get('/home', 'HomeController@index')->name('home');




// Auth::routes();