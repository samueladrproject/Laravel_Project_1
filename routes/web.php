<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DataArtikelController;
use App\Http\Controllers\Backend\DataAturanController;
use App\Http\Controllers\Backend\DataGejalaController;
use App\Http\Controllers\Backend\DataPenyakitController;
use App\Http\Controllers\Backend\DataRiwayatController;
use App\Http\Controllers\Backend\UbahPasswordController;
use App\Http\Controllers\Frontend\BantuanController;
use App\Http\Controllers\Frontend\KonsultasiController;
use App\Http\Controllers\Frontend\InfoPenyakitController;
use App\Http\Controllers\Frontend\TentangController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/konsultasi', [KonsultasiController::class, 'index']);
Route::post('/konsultasi/pencarian', [KonsultasiController::class, 'prosesCari']);
Route::get('/konsultasi/{dataPasien?}', [KonsultasiController::class, 'tampilkanHasil']);
Route::post('/konsultasi', [KonsultasiController::class, 'hasilkonsultasi']);
Route::get('/info-penyakit', [InfoPenyakitController::class, 'index']);
Route::get('/tentang', [TentangController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('data-penyakit', DataPenyakitController::class)->except('show');
    Route::resource('data-gejala', DataGejalaController::class)->except('show');
    Route::resource('data-aturan', DataAturanController::class)->except('show');
    Route::get('/data-riwayat', [DataRiwayatController::class, 'index']);
    Route::post('/data-riwayat', [DataRiwayatController::class, 'hapus']);
    Route::get('/ubah-password', [UbahPasswordController::class, 'index']);
    Route::post('/ubah-password', [UbahPasswordController::class, 'changePassword']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::get('/api/data-riwayat', [DataRiwayatController::class, 'apiGetData']);
