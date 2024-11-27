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

    Route::get('/lowongan/create', [LowonganController::class, 'create'])->name('lowongan.create');
    Route::post('/lowongan', [LowonganController::class, 'store'])->name('lowongan.store');
    Route::get('/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
    Route::put('/lowongan/{id}', [LowonganController::class, 'update'])->name('lowongan.update');
    Route::delete('/lowongan/{id}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');

    Route::get('/daftar_perusahaan', [DaftarPerusahaanController::class, 'index2'])->name('daftar_perusahaan');
    Route::get('/daftar_perusahaan/tambah', [DaftarPerusahaanController::class, 'index3'])->name('daftar_perusahaan.tambah');
    Route::post('/perusahaan', [DaftarPerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::get('/perusahaan/{id}/edit', [DaftarPerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::put('/perusahaan/{id}', [DaftarPerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::put('/perusahaan/{id}', [DaftarPerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
    Route::get('/perusahaan/{id}', [DaftarPerusahaanController::class, 'show'])->name('perusahaan.show');


    Route::get('/acara_', [AcaraController::class, 'index2'])->name('acara_');
    Route::get('/acara_/tambah', [AcaraController::class, 'index3'])->name('acara_/tambah');


    Route::get('/berita_', [BeritaController::class, 'index2'])->name('berita_');
    Route::get('/berita_/tambah', [BeritaController::class, 'index3'])->name('berita_.tambah');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::put('berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');



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
Route::get('/perusahaan/{id}', [DaftarPerusahaanController::class, 'show'])->name('perusahaan.show');

// Route untuk menyimpan data perusahaan
Route::post('/daftar-perusahaan', [DaftarPerusahaanController::class, 'store'])->name('store.perusahaan');

// Rute untuk Admin Acara
Route::prefix('SIK')->group(function () {
    // Menampilkan semua acara
    Route::get('/acara', [AcaraController::class, 'index'])->name('acara_');

    // Menampilkan form tambah acara
    Route::get('/acara_/create', [AcaraController::class, 'create'])->name('acara.create');

    // Menyimpan acara baru
    Route::post('/acara', [AcaraController::class, 'store'])->name('acara.store');

    // Menampilkan form edit acara
    Route::get('/acara/edit/{id}', [AcaraController::class, 'edit'])->name('acara.edit');

    // Memperbarui acara yang ada
    Route::put('/acara/update/{id}', [AcaraController::class, 'update'])->name('acara.update');

    // Menghapus acara
    Route::delete('/acara/delete/{id}', [AcaraController::class, 'destroy'])->name('acara.destroy');
});

// Rute untuk User
Route::get('/acara', [AcaraController::class, 'index2'])->name('acara.index');
Route::get('/acara/{id}', [AcaraController::class, 'show'])->name('acara.show');



// Routes for Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

// Routes for Artikel
Route::prefix('admin')->group(function () {
    Route::get('/artikel', [ArtikelController::class, 'index2'])->name('admin.artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::delete('/artikel/delete/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');


    Route::put('/perusahaan/{id}', [DaftarPerusahaanController::class, 'update'])->name('perusahaan.update');

    Route::put('berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
});

// Routes for Artikel
Route::get('/artikel/cari', [ArtikelController::class, 'search'])->name('artikel.search');

// Route untuk daftar artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

