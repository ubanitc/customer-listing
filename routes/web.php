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
    return redirect('/customers');
});

Route::group([
    'prefix' => 'customers',
], function () {
    Route::get('/', 'CustomersController@index')
         ->name('customers.customer.index');
    Route::get('/create','CustomersController@create')
         ->name('customers.customer.create');
    Route::get('/show/{customer}','CustomersController@show')
         ->name('customers.customer.show');
    Route::get('/{customer}/edit','CustomersController@edit')
         ->name('customers.customer.edit');
    Route::post('/', 'CustomersController@store')
         ->name('customers.customer.store');
    Route::put('customer/{customer}', 'CustomersController@update')
         ->name('customers.customer.update');
    Route::delete('/customer/{customer}','CustomersController@destroy')
         ->name('customers.customer.destroy');
});
