<?php

use App\Models\biaya;
use App\Models\Menara;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenaraController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\RetribusiController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'cekLogin']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/lupapassword', [ResetPassword::class, 'index'])->name('forgot.password.form');
Route::post('/lupapassword', [ResetPassword::class, 'store'])->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('login.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::put('/updatepassword', [ResetPassword::class, 'update'])->name('password.update');

Route::get('register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dasboard', [DasboardController::class, 'index'])->name('dasboard')->middleware('auth:user');


Route::resource('/pegawai', PegawaiController::class)->middleware('auth:user');
Route::put('/pegawai/{id}/edit', [PegawaiController::class, 'update']);

Route::put('/profile/{id}/edit', [PegawaiController::class, 'profile']);
Route::get('/myprofile', [PegawaiController::class, 'formedit'])->name('myprofile')->middleware('auth:user,pengguna');



Route::resource('/pengguna', PenggunaController::class)->middleware('auth:user');
Route::put('/pengguna/{id}/edit', [PenggunaController::class, 'update'])->middleware('auth:user');
Route::get('/pengguna/{id}', [PenggunaController::class, 'delete'])->middleware('auth:user');

Route::resource('/provider', ProviderController::class)->middleware('auth:user');

Route::resource('/menara', MenaraController::class)->middleware('auth:user');
Route::put('/menara/{id}/edit', [MenaraController::class, 'update']);

Route::get('/peta', [MenaraController::class, 'map'])->name('peta')->middleware('auth:user');


Route::resource('/kecamatan', KecamatanController::class)->middleware('auth:user');
Route::put('/kecamatan/{id}/edit', [KecamatanController::class, 'update']);

Route::resource('/jenis', JenisController::class)->middleware('auth:user');
Route::put('/jenis/{id}/edit', [JenisController::class, 'update']);

Route::resource('/retribusi', RetribusiController::class)->middleware('auth:user');
Route::get('/retribusi/{id}', [RetribusiController::class, 'getTagihan']);

Route::get('/coba', function () {
    return view('provider.menara.coba');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth:pengguna');

Route::get('/cobain', function () {
    return view('profile');
})->middleware('auth:user');


