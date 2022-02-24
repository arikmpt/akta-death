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



//Route::get('/search', 'BaratkelController@search')->name('search');



Route::resource('/baratkel','BaratkelController');
Route::resource('/baratkecamatan','BaratkecamatanController');


Route::resource('/keltimur','TimurkelController');
Route::resource('/Timurkecamatan','TimurkecamatanController');


Route::resource('/utarakel','UtarakelController');
Route::resource('/Utarakecamatan','UtarakecamatanController');


Route::resource('/latinakel','LatinakelController');
Route::resource('/latinakecamatan','LatinakecamatanController');


Route::resource('/selatankel','SelatankelController');
Route::resource('/selatankecamatan','SelatankecamatanController');
//Route::get('/search', 'SelatankecamatanController@search')->name('search');



Route::get('/search', 'LatinakecamatanController@search')->name('search');

Route::get('/search', 'UtarakecamatanController@search')->name('search');
Route::get('/search', 'TimurkecamatanController@search')->name('search');

Route::get('/search', 'BaratkecamatanController@search')->name('search');

//Route::resource('/keltimur','KeltimurController');


//Route::get('scan-barat','KecamatanbaratController@scanbarat')->name('scan-barat');
//Route::get('scan-utara','KecamatanutaraController@scanutara')->name('scan-utara');

//Route::resource('/kelurahan','KelurahanController');
//Route::get('cetak-akta','DatakematianController@cetakakta')->name('cetak-akta');
// Route::get('cetak-agustus','DatakematianController@cetakagustus')->name('cetak-agustus');
// Route::get('cetak-suarti/{id}','DatakematianController@cetaksuarti')->name('cetak-suarti');
//Route::get('cetak','DatakematianController@cetak')->name('cetak');
//Route::get('/search', 'KecamatanbaratController@search')->name('search');
//Route::get('/search', 'SeptemberController@search')->name('search');
//Route::get('cetak-september','SeptemberController@cetakseptember')->name('cetak-september');
// Route::resource('/datakematian','DatakematianController');
//Route::resource('/september','SeptemberController');

//Route::resource('/user', 'UserController');

});
