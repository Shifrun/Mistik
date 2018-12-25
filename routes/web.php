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




Route::get('', 'MasterController@home');
Route::get('/', 'MasterController@home');
Route::get('home', 'MasterController@home');
Route::get('/home', 'MasterController@home');

Route::resource('logistik','LogistikController');
Route::resource('laporan','LaporanController');
Route::resource('kategori','KategoriController');
Route::resource('pengungsi','PengungsiController');
Route::resource('donasi','DonasiController');
// Route::post('laporan.store2', 'LaporanController@store2');
Auth::routes();

Route::get('laporkan', 'MasterController@laporan');
Route::get('donasikan', 'MasterController@donasikan');
Route::post('/laporkan/proses', 'MasterController@store_laporan');
Route::post('/donasi/proses', 'MasterController@store_donasikan');
Route::get('tentang', 'MasterController@tentang');
Route::get('map', 'MasterController@map');
Route::get('dasbor', 'MasterController@dasbor');
