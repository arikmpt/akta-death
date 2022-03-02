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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/kecamatan','KecamatanController');
    Route::any('/kecamatan-search','KecamatanController@search')->name('kecamatan.search');
    Route::resource('/kelurahan','KelurahanController');
    Route::any('/kelurahan-search','KelurahanController@search')->name('kelurahan.search');

    Route::resource('/datakematian','DatakematianController');
    Route::any('/datakematian-search','DatakematianController@search')->name('kematian.search');
    Route::post('/kelurahan-list','DatakematianController@kelurahanList')->name('kelurahan.list');

    Route::get('/rekap-data-kematian/{kecamatan_id}', 'RekapDataKematianController@index')->name('rekap.kematian.index');
    Route::get('/rekap-data-kematian/search/{kecamatan_id}', 'RekapDataKematianController@search')->name('rekap.kematian.search');
});
