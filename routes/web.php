<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\DaftarPerusahaanController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ArtikelController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('web.home');
});


//Route Tampilan Admin
Route::prefix('auth')->group(function () {
    Route::get("/login", [AuthController::class, "getLogin"])->name("login");
    Route::post("/login", [AuthController::class, "postLogin"])->name("post.login");

    Route::get("/logout", [AuthController::class, "getLogout"])->name("logout");
});

Route::middleware('auth')->group(function () {
    Route::get('/Dasbor', [DasborController::class, 'showDasbor'])->name('dasbor');

    Route::get('/lowongan_kerja', [LowonganController::class, 'index2'])->name('lowongan_kerja');
    Route::get('/lowongan_kerja/tambah', [LowonganController::class, 'index3'])->name('lowongan_kerja/tambah');

    Route::get('/daftar_perusahaan', [DaftarPerusahaanController::class, 'index2'])->name('daftar_perusahaan');
    Route::get('/daftar_perusahaan/tambah', [DaftarPerusahaanController::class, 'index3'])->name('daftar_perusahaan/tambah');


    Route::get('/acara_', [AcaraController::class, 'index2'])->name('acara_');
    Route::get('/acara_/tambah', [AcaraController::class, 'index3'])->name('acara_/tambah');


    Route::get('/berita_', [BeritaController::class, 'index2'])->name('berita_');


    Route::get('/artikel_', [ArtikelController::class, 'index2'])->name('artikel_');

});

//Route Charlos
Route::get('/lowongan-kerja', [LowonganController::class, 'index2'])->name('lowongan-kerja');

Route::get('/lowongan_kerja', [LowonganController::class, 'index'])->name('lowongan_kerja');
Route::get('/lowongan/create', [LowonganController::class, 'create'])->name('lowongan.create');
Route::post('/lowongan', [LowonganController::class, 'store'])->name('lowongan.store');
Route::get('/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
Route::put('/lowongan/{id}', [LowonganController::class, 'update'])->name('lowongan.update');
Route::delete('/lowongan/{id}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');


// Route untuk daftar perusahaan
Route::get('/daftar-perusahaan', [DaftarPerusahaanController::class, 'index'])->name('daftar.perusahaan');

// Route untuk menyimpan data perusahaan
Route::post('/daftar-perusahaan', [DaftarPerusahaanController::class, 'store'])->name('store.perusahaan');

// Routes for Acara
Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index');
Route::get('/acara/create', [AcaraController::class, 'create'])->name('acara.create');
Route::post('/acara', [AcaraController::class, 'store'])->name('acara.store');
Route::get('/acara/{id}', [AcaraController::class, 'show'])->name('acara.show');
Route::get('/acara/{id}/edit', [AcaraController::class, 'edit'])->name('acara.edit');
Route::put('/acara/{id}', [AcaraController::class, 'update'])->name('acara.update');
Route::delete('/acara/{id}', [AcaraController::class, 'destroy'])->name('acara.destroy');

// Routes for Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

// Routes for Artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');


