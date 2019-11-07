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


Route::middleware(['auth'])->group(function () {
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/car/customer', 'CustomerController@getCustomer');
		Route::get('/ticket/customer', 'CustomerController@getCustomer');
		Route::get('/ticket/car', 'CarController@getCar');
		Route::get('/ticket/cellar', 'CellarController@getCellar');
		Route::get('/ticket/posts', 'PostController@getPost');
		Route::get('/ticket/getpostsall', 'PostController@getpostsall');
		Route::get('/ticket/editexit/{id}', 'TicketController@editexit');
		
		Route::post('customer', 'CustomerController@store');
	
		Route::resource('ticket', 'TicketController');
		Route::resource('customer', 'CustomerController');
		Route::resource('car', 'CarController');
	
	Route::middleware(['admin'])->group(function () {
	  
		Route::resource('report', 'ReportController');
		Route::resource('cellar', 'CellarController');
		



	});
});
