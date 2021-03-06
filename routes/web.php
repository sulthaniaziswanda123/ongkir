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

// Example Routes

Route::get('/cek', 'OngkirController@index')->name('cek');
Route::post('/cek', 'OngkirController@store')->name('store.ongkir');

Route::get('/gempa', 'GempaController@index')->name('gempa');
Route::get('/gempa/ongkir/{lat}/{lon}', 'GempaController@ongkir')->name('gempa.ongkir');
Route::post('/gempa/cek/{lat}/{lon}', 'GempaController@store')->name('gempa.ongkir.price');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');
