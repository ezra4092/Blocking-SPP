<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Spp;
use App\Http\Controllers\ResetPasswordController;

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
})->name('login');
Route::post('/login/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class, 'logout'])->name('logout');

Route::get('/auth/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/auth/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::group(['middleware' => ['auth']], function() {

    Route::group(['midddleware' => ['cekUserLogin:admin']], function () {
        Route::resource('admin', Spp::class);

        Route::get('/user', [Spp::class, 'showForm']);
        Route::post('/update/akun', [Spp::class, 'akun']);

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

