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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/keranjang', 'ControllerKeranjang@store')->name('keranjang.store');
Route::patch('/keranjang/{keranjang}','ControllerKeranjang@update')->name('keranjang.update');
Route::delete('/keranjang/{keranjang}','ControllerKeranjang@delete')->name('keranjang.delete');

Route::post('/transaksi','ControllerTransaksi@store')->name('transaksi.store');
Route::get('/transaksi','ControllerTransaksi@index')->name('transaksi.index');
Route::get('/transaksi/{transaksis}','ControllerTransaksi@show')->name('transaksi.show');