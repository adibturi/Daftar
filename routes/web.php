<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\tableController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\crudberitaController;
use App\Http\Controllers\tablebuktiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\uploadpembayaranController;
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

Route::get('/daftar', function () {
    return view('pendaftaran');
});

Route::get('/', function () {
    return view('homepage');
});


Route::get('/cek', function () {
    return view('cek');
});


Route::get('/berita', function () {
    return view('berita');
});

//LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//DASHBOARD
Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [BerandaController::class, 'index']);
Route::get('/table', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::get('/tablebukti',[tablebuktiController::class,'index'])->name('tablebukti.index');
Route::resource('laporan', laporanController::class);
Route::delete('/upload/{nisn}', [PendaftaranController::class, 'destroy'])->name('upload.destroy');


Route::get('/pendaftaran/{nisn}/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
Route::put('pendaftaran/{nisn}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
Route::delete('/pendaftaran/{nisn}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');

//CRUD BERITA
Route::get('/buatberita',[crudberitaController::class,'index'])->name('crudberita.index');
});

//PENDAFTARAN
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::post('/pendaftaran/confirm', [PendaftaranController::class, 'confirmPayment'])->name('pendaftaran.confirm');


//berita
Route::get('/', [BeritaController::class, 'index'])->name('landing-page');
Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/load-more-berita', [BeritaController::class, 'loadMore'])->name('berita.loadMore');

//UPLOAD PEMBAYARAN
Route::get('/upload',[uploadpembayaranController::class,'index'])->name('uploadpembayaran.index');
Route::post('/upload',[uploadpembayaranController::class,'store'])->name('uploadpembayaran.store');
Route::post('/pendaftaran/getSnapToken', [PendaftaranController::class, 'getSnapToken'])->name('pendaftaran.getSnapToken');
Route::post('/pendaftaran/confirm', [PendaftaranController::class, 'confirm'])->name('pendaftaran.confirm');
