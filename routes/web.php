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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/car/customer', 'CustomerController@getCustomer');
Route::resource('ticket', 'TicketController');
//Route::post('/car/create', 'CarController@create')->name('car.create');
Route::resource('car', 'CarController');
Route::resource('customer', 'CustomerController');
Route::resource('cellar', 'CellarController');
Route::resource('post', 'PostController');
Route::resource('texit', 'TexitController');
