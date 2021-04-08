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

// Route::get('/', function () {
//     return view('welcome');
// });

//route login
Route::get('/', function () {
	
    return view('login');
})->name('login')->middleware('guest'); //middle ware guest buat yg blom login

//route register
Route::get('register','AuthController@register')->name('register')->middleware('guest');

//route proses login
Route::post('proses-login','AuthController@prosesLogin')->name('proses-login')->middleware('guest');
//route proses register
Route::post('proses-register', 'AuthController@prosesregister')->name('proses-register')->middleware('guest');

//lembaga
Route::get('/lembaga{id}', 'LembagaController@index')->name('lembaga')->middleware(['pemesan', 'auth']);

Route::get('payment', 'TransaksiController@generatePaymentToken');



//Paket
Route::get('/paket-detail{id}', 'PaketController@detail')->name('paket-detail')->middleware(['pemesan', 'auth']);
Route::get('/paket-booking{id}', 'PaketController@booking')->name('paket-booking')->middleware(['pemesan', 'auth']); 
Route::post('/paket-prosesbooking', 'PaketController@prosesbooking')->name('paket-prosesbooking')->middleware(['pemesan','auth']);
Route::get('/paket-kelolapaket', 'PaketController@kelolapaket')->name('paket-kelolapaket')->middleware(['admin', 'auth']); //middle ware admin 
Route::get('/paket-tambahpaket', 'PaketController@tambahpaket')->name('paket-tambahpaket')->middleware(['admin', 'auth']); //middle ware admin 
Route::post('/paket-addpaket', 'PaketController@addpaket')->name('paket-addpaket')->middleware(['admin','auth']);
Route::get('paket-deletepaket/{id}','PaketController@destroypaket')->name('paket-deletepaket')->middleware(['admin','auth']);
Route::get('/paket-paketedit{id}', 'PaketController@edit')->name('paket-editpaket')->middleware(['admin', 'auth']);//middleware admin
Route::post('/paket-updatepaket/{id}', 'PaketController@updatepaket')->name('paket-updatepaket/{id}')->middleware(['admin','auth']); //middleware admin. proses update dibawa ke PaketController


// Admin
Route::get('/admin', 'AdminController@index')->name('dashboard-admin')->middleware(['admin', 'auth']); //middle ware admin 
Route::get('/admin-infobooking', 'AdminController@infobooking')->name('admin-infobooking')->middleware(['admin', 'auth']); //middle ware admin 
Route::get('admin_booking_cari','AdminController@carikode')->name('admin_booking_cari')->middleware(['admin','auth']);
Route::post('admin-tambah_profil','AdminController@add_profil')->name('admin-tambah_profil')->middleware(['admin','auth']);



//Super Admin
Route::get('/superadmin', 'SuperadminController@index')->name('dashboard-superadmin')->middleware(['superadmin', 'auth']);
Route::get('/superadmin-kelolalembaga', 'SuperadminController@kelolalembaga')->name('superadmin-kelolalembaga')->middleware(['superadmin', 'auth']);
Route::post('/superadmin-addlembaga', 'SuperadminController@addlembaga')->name('superadmin-addlembaga')->middleware(['superadmin', 'auth']);
Route::get('/superadmin-detaillembaga{id}', 'SuperadminController@detaillembaga')->name('superadmin-detaillembaga')->middleware(['superadmin', 'auth']);
Route::post('/superadmin-tambahadmin', 'SuperadminController@tambahadmin')->name('superadmin-tambahadmin')->middleware(['superadmin', 'auth']);
Route::get('superadmin-deletelembaga/{id}','SuperadminController@destroylembaga')->name('superadmin-deletelembaga')->middleware(['superadmin','auth']);


//Premesan
Route::get('/pemesan', 'PemesanController@index')->name('dashboard-pemesan')->middleware(['pemesan','auth']); // hanya pemesan
Route::get('/editprofil', 'PemesanController@profil')->name('pemesan-editprofil')->middleware(['pemesan','auth']); // hanya pemesan
Route::post('/updateprofil/{id}', 'PemesanController@updateprofil')->name('pemesan-updateprofil/{id}')->middleware(['pemesan','auth']); 
Route::put('/updatefoto/{id}', 'PemesanController@updatefoto')->name('pemesan-updatefoto/{id}')->middleware(['pemesan','auth']); // hanya pemesan
Route::get('/pemesan-bookingpending', 'PemesanController@bookingpending')->name('pemesan-bookingpending')->middleware(['pemesan','auth']); // hanya pemesan
Route::get('/pemesan-bookingsukses', 'PemesanController@bookingsukses')->name('pemesan-bookingsukses')->middleware(['pemesan','auth']); // hanya pemesan
Route::get('pemesan-deletebooking/{id}','PemesanController@destroybooking')->name('pemesan-deletebooking')->middleware(['pemesan','auth']);





//route logout
Route::get('logout-pemesan', 'AuthController@logout')->name('logout-pemesan')->middleware(['pemesan', 'auth']);// hanya pemesan
Route::get('logout-admin', 'AuthController@logout')->name('logout-admin')->middleware(['admin', 'auth']);// hanya admin
Route::get('logout-superadmin', 'AuthController@logout')->name('logout-superadmin')->middleware(['superadmin', 'auth']);// hanya admin


