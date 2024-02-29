<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Spp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/login/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class, 'logout'])->name('logout');


Route::get('/reset-password', function () {
    return view('reset'); // Asumsi Anda memiliki view bernama reset-password.blade.php
})->name('reset-password');

Route::post('/update-password/{id}', 'PasswordController@update')->name('password.update');


Route::group(['middleware' => ['auth']], function() {

    Route::group(['midddleware' => ['cekUserLogin:admin']], function () {
        Route::resource('admin', Spp::class);

        Route::get('/pembayaran', [Spp::class, 'index'])->name('pembayaran');
        Route::post('/pembayaran/save', [Spp::class, 'save']);

        Route::delete('/pembayaran/delete/{id}', [Spp::class, 'delete'])->name('pembayaran.delete');

        Route::get('/pembayaran/edit/{id}', [Spp::class, 'edit'])->name('pembayaran.edit');
        Route::put('/pembayaran/update/{id}', [Spp::class, 'update'])->name('pembayaran.update');
    });
    Route::group(['midddleware' => ['cekUserLogin:siswa']], function () {
        Route::resource('siswa', Siswa::class);

        Route::get('/siswa', [Siswa::class, 'index']);
    });
});

