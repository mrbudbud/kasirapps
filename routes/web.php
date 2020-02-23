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
    return view('auth/login');
});

Auth::routes();
Route::group(['middleware' => ['auth','ceklevel:1']], function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/customer', 'TableCustomerController@index')->name('homeCustomer');
<<<<<<< HEAD
    Route::post('/insertcustomer', 'TableCustomerController@store')->name('insertCustomer');
=======
    Route::post('/customer/insertcustomer', 'TableCustomerController@store')->name('insertCustomer');
    Route::get('/customer/cari', 'TableCustomerController@cari')->name('cariCustomer');
    Route::get('/customer/formedit/{id}', 'TableCustomerController@edit')->name('formEditCustomer');
    Route::post('/customer/update/{id}', 'TableCustomerController@update')->name('updateCustomer');
>>>>>>> c3ab45c3ade052b1a179669f7932e72892572e17

});