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
Route::get('/sair', 'ClientController@logout');
Route::get('/painel-cliente', 'ClientController@index')->middleware('auth:client');


//States and cities routes
Route::apiResource('states', 'StateController');

Route::apiResource('cities', 'CityController');

Route::apiResource('clients', 'ClientController')->except([
    'index', 'create',
]);;

Route::get('clients', 'ClientController@show');

Route::apiResource('ads', 'ClientController')->except([
    'showByCity', 'showByState', 'getByClient', 'index'
]);;

Route::get('ads/{id}', 'AdController@getByClient');
Route::get('barbadas/estado/{state}', 'AdController@showByState');
Route::get('barbadas/cidade/{city}', 'AdController@showByCity');

// Route::get('/home', 'HomeController@index')->name('home');




// Auth::routes();