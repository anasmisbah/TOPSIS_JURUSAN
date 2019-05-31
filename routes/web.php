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

Route::resource('kriteria', 'KriteriaController');
Route::resource('alternatif', 'AlternatifController');
Route::resource('siswa', 'SiswaController');    
Route::get('/perhitungan','PerhitunganController@daftarSiswa')->name('perhitungan.siswa');
Route::get('/perhitungan/{id}','PerhitunganController@prosesHitung')->name('perhitungan.proseshitung');

