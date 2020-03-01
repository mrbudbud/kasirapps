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
    
    // transaksi route
    Route::get('/home', 'TransaksiController@index')->name('transaksi');
    Route::post('/transaksi/insert', 'TransaksiController@store')->name('insertTransaksi');
    Route::post('/api/listbarang', 'barangController@apiListBarang');

    //admin
    //customer
    Route::get('/customer', 'TableCustomerController@index')->name('tampilCustomerKasir');
    Route::post('/customer/insertcustomer', 'TableCustomerController@store')->name('insertCustomerKasir');
    Route::get('/customer/cari', 'TableCustomerController@cari')->name('cariCustomerKasir');
    Route::get('/customer/formedit/{id}', 'TableCustomerController@edit')->name('formEditCustomerKasir');
    Route::post('/customer/update/{id}', 'TableCustomerController@update')->name('updateCustomerKasir');
    Route::get('/customer/delete/{id}', 'TableCustomerController@destroy')->name('deleteCustomerKasir');
    
    //admin
    //barang
    Route::get('/barang', 'barangController@index')->name('tampilBarangKasir');
    Route::get('/barang/cari', 'barangController@cari')->name('cariBarangKasir');
    
});


//  akses atasan
Route::group(['middleware' => ['auth','ceklevel:2']], function(){

    // hari ini
    Route::get('/atasan', 'TransaksiController@summeryThisDay')->name('summeryThisDay');
    Route::get('/atasan/bonusharian', 'TerapisController@bonusHarian')->name('bonusHarian');
    
    Route::get('/atasan/bonusharian/sendmailall', 'TerapisController@sendAll')->name('sendMail');
    // barang
    Route::get('/atasan/terapis/tampilbarang', 'barangController@index')->name('tampilBarang');
    Route::post('/atasan/barang/insertbarang', 'barangController@store')->name('insertBarang');
    Route::get('/atasan/barang/cari', 'barangController@cari')->name('cariBarang');
    Route::get('/atasan/barang/formeditbarang/{id}', 'barangController@edit')->name('formEditBarang');
    Route::post('/atasan/barang/update/{id}', 'barangController@update')->name('updateBarang');
    Route::get('/atasan/barang/delete/{id}', 'barangController@destroy')->name('deleteBarang');
    
    //terapis
    Route::get('/atasan/terapis', 'TerapisController@index')->name('tampilTerapis');
    Route::post('/atasan/terapis/insertterapis', 'TerapisController@store')->name('insertTerapis');
    Route::get('/atasan/terapis/cari', 'TerapisController@cari')->name('cariTerapis');
    Route::get('/atasan/terapis/formeditterapis/{id}', 'TerapisController@edit')->name('formEditTerapis');
    Route::post('/atasan/terapis/update/{id}', 'TerapisController@update')->name('updateTerapis');
    Route::get('/atasan/terapis/delete/{id}', 'TerapisController@destroy')->name('deleteTerapis');
    
    //customer
    Route::get('/atasan/customer', 'TableCustomerController@index')->name('tampilCustomer');
    Route::post('/atasan/customer/insertcustomer', 'TableCustomerController@store')->name('insertCustomer');
    Route::get('/atasan/customer/cari', 'TableCustomerController@cari')->name('cariCustomer');
    Route::get('/atasan/customer/formedit/{id}', 'TableCustomerController@edit')->name('formEditCustomer');
    Route::post('/atasan/customer/update/{id}', 'TableCustomerController@update')->name('updateCustomer');
    Route::get('/atasan/customer/delete/{id}', 'TableCustomerController@destroy')->name('deleteCustomer');
    // rekap transaksi
    Route::get('/atasan/transaksi/rekap', function (){
        return view('atasan.transaksi.selectrekap');
    })->name('rekapTransaksi');
    Route::post('/atasan/transaksi/rekap', 'TransaksiController@showRekap')->name('showRekap');

}); 
