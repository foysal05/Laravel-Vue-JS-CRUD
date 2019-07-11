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
Route::get('/customer', 'CustomerController@index')->name('customer');
Route::post('/customer/save', 'CustomerController@save')->name('customer_save');
Route::get('/customer/show', 'CustomerController@customerList')->name('customer_show');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer_edit');
Route::post('/customer/update/{id}', 'CustomerController@update')->name('customer_update');
Route::post('/customer/delete/{id}', 'CustomerController@delete')->name('customer_delete');
