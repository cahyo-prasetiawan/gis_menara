<?php

use App\Models\biaya;
use App\Models\Menara;
use App\Models\Provider;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenaraController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\RetribusiController;
use App\Http\Controllers\PesanController;

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

// Route::get('/reset-password/{token}', function (string $token) {
//     return view('login.reset', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

Route::get('/reset-password/{token}', [ResetPassword::class, 'edit'])->middleware('guest')->name('password.reset');
Route::post('/reset-password/{token}', [ResetPassword::class, 'update'])->middleware('guest')->name('password.update');


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
Route::get('/cetak', [MenaraController::class, 'cetakPdf']);
Route::get('/cari/{id}', [MenaraController::class, 'getMenara']);
Route::get('/cariM/{id}', [MenaraController::class, 'getLok']);
Route::get('/menaraCetak', [MenaraController::class, 'menaraCetak'])->middleware('auth:user');

Route::get('/menaraDetail/{id}', [MenaraController::class, 'Detail'])->middleware('auth:user');
Route::get('/menaraRute/{id}', [MenaraController::class, 'Rute'])->middleware('auth:user');
Route::get('/peta', [MenaraController::class, 'map'])->name('peta')->middleware('auth:user');

Route::get('/test', [MenaraController::class, 'tes'])->middleware('auth:user');


Route::resource('/kecamatan', KecamatanController::class)->middleware('auth:user');
Route::put('/kecamatan/{id}/edit', [KecamatanController::class, 'update']);

Route::resource('/jenis', JenisController::class)->middleware('auth:user');
Route::put('/jenis/{id}/edit', [JenisController::class, 'update']);

Route::resource('/retribusi', RetribusiController::class)->middleware('auth:user');
Route::get('/tagihan/{id}', [RetribusiController::class, 'getTagihan']);
Route::get('/tarif/{id}', [RetribusiController::class, 'getTarif']);
Route::get('/email/{id}', [RetribusiController::class, 'getEmail']);
Route::get('/total/{id}', [RetribusiController::class, 'total']);
Route::put('/retribusi/{id}/edit',[RetribusiController::class, 'update']);
Route::get('/read/{id}',[RetribusiController::class, 'read']);
Route::get('/cetakR/{id}', [RetribusiController::class, 'cetakPdf']);
Route::get('/readAll',[RetribusiController::class, 'readAll']);

Route::resource('/laporan', LaporanController::class)->middleware('auth:user');
Route::get('/lapcetak', [LaporanController::class, 'cetak'])->middleware('auth:user');

Route::post('/kirimEmail', [RetribusiController::class, 'kirimEmail'])->middleware('auth:user');
Route::get('/kirim', [RetribusiController::class, 'formKirim'])->middleware('auth:user');

Route::get('/home', [TampilanController::class, 'index'])->name('home')->middleware('auth:pengguna');

Route::get('/halretribusi', [TampilanController::class, 'retribusi'])->name('retribusi')->middleware('auth:pengguna');
Route::get('/halmenara', [TampilanController::class, 'menara'])->name('menara')->middleware('auth:pengguna');
Route::get('/kontak', [TampilanController::class, 'kontak'])->name('kontak')->middleware('auth:pengguna');
Route::get('/akun', [TampilanController::class, 'akun'])->name('akun')->middleware('auth:pengguna');
Route::get('/lihat/{id}', [TampilanController::class, 'detail'])->name('detail')->middleware('auth:pengguna');

Route::get('/rute/{id}', [TampilanController::class, 'rute'])->name('rute')->middleware('auth:pengguna');

Route::put('/akun/{id}/edit', [TampilanController::class, 'profile']);

Route::get('/coba', function () {
    return view('interface.cok');
});

Route::get('/cek', function () {
    return view('peta');
});


Route::get('/cobain', function () {
    return view('provider.retribusi.buat',[
        'providers' => Provider::all()
    ]);
})->middleware('auth:user');

// Route::get('/cetakR', function () {
//     return view('provider.retribusi.cetak',[
//         'providers' => Provider::all()
//     ]);
// })->middleware('auth:user');

Route::resource('/pesan', PesanController::class)->middleware('auth:user,pengguna');


Route::get('/kom', function () {
    return view('interface.kom');
});






