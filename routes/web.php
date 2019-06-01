<?php
use App\Siswa;

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
    return redirect()->route('home');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('kriteria', 'KriteriaController');
    Route::resource('alternatif', 'AlternatifController');
    Route::resource('siswa', 'SiswaController');    
    Route::get('/perhitungan','PerhitunganController@daftarSiswa')->name('perhitungan.siswa');
    Route::get('/perhitungan/{id}','PerhitunganController@prosesHitung')->name('perhitungan.proseshitung');
    Route::get('/perangkingan','PerhitunganController@perangkingan')->name('perhitungan.perangkingan');
    Route::get('/cetakhasil','PerhitunganController@cetakhasil')->name('perhitungan.cetakhasil');

});

// Route::get('/cetakhasil', function () {
//         $siswaall = Siswa::all();
//         $pdf = PDF::loadView('perhitungan.cetakhasil', $siswaall);
//         return $pdf->download('hasilperhitungan.pdf');
// })->name('perhitungan.cetakhasil');

Auth::routes();


