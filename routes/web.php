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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth','ceklevel:1']], function(){
    Route::get('/home', 'HomeController@index')->name('transaksi');
    

    //customer
    Route::get('/customer', 'TableCustomerController@index')->name('tampilCustomer');
    Route::post('/customer/insertcustomer', 'TableCustomerController@store')->name('insertCustomer');
    Route::get('/customer/cari', 'TableCustomerController@cari')->name('cariCustomer');
    Route::get('/customer/formedit/{id}', 'TableCustomerController@edit')->name('formEditCustomer');
    Route::post('/customer/update/{id}', 'TableCustomerController@update')->name('updateCustomer');
    
    //barang
    Route::get('/barang', 'barangController@index')->name('tampilBarang');
    Route::post('/barang/insertbarang', 'barangController@store')->name('insertBarang');
    Route::get('/barang/cari', 'barangController@cari')->name('cariBarang');
    Route::get('/barang/formeditbarang/{id}', 'barangController@edit')->name('formEditBarang');
    Route::post('/barang/update/{id}', 'barangController@update')->name('updateBarang');
    
    
});


//akses atasan
// Route::group(['middleware' => ['auth','ceklevel:2']], function(){

    
// });
