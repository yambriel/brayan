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
		Route::get('/customer/carnet/', 'CustomerController@getCarnet');
		Route::get('/customer/placa/', 'CustomerController@getPlaca');
		Route::get('/ticket/customer', 'CustomerController@getCustomer');
		Route::get('/ticket/car', 'CarController@getCar');
		Route::get('/ticket/cellar', 'CellarController@getCellar');
		Route::get('/ticket/posts', 'PostController@getPost');
		Route::get('/home/chartRequest', 'TicketController@getChart');
		Route::get('/ticket/getpostsall', 'PostController@getpostsall');
		Route::get('/ticket/editexit/{id}', 'TicketController@editexit');
		Route::get('/report/customer/', 'TicketController@getReportCustomer');
		Route::get('/report/post/', 'CellarController@getReportPost');
		Route::get('/report/ticket/', 'TicketController@getReportTicket');
		Route::get('/report/tickets/', 'TicketController@getTicket');
		Route::get('report', 'ReportController@getprocess');


		Route::post('customer', 'CustomerController@store');
		Route::post('car', 'CarController@store');
		Route::post('ticket', 'TicketController@store');

		Route::resource('ticket', 'TicketController');
		Route::resource('customer', 'CustomerController');
		Route::resource('car', 'CarController');

	Route::middleware(['admin'])->group(function () {

		Route::get('/Ticket/getDelete/{id}', 'TicketController@destroy');
		Route::get('/customer/getDelete/{id}', 'CustomerController@destroy');
		Route::get('/car/getDelete/{id}', 'CarController@destroy');
		Route::get('/cellar/getDelete/{id}', 'CellarController@destroy');
		Route::resource('report', 'ReportController');
		Route::resource('cellar', 'CellarController');



	});
});
