<?php
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pengajuan-lokasi-sppg', [HomeController::class, 'pengajuanLokasi'])->name('otp.pl');
Route::get('/pengajuan-lokasi-sppg/detail', [HomeController::class, 'pengajuanLokasiDetail'])->name('otp.pl-detail');
Route::get('/mitra', [HomeController::class, 'mitra'])->name('otp.mitra');
Route::get('/otp', [OtpController::class, 'form'])->name('otp.form');
Route::post('/otp', [OtpController::class, 'verify'])->name('otp.verify');
