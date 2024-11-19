<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\HomeController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('web.home');
});


Route::prefix('auth')->group(function () { 
    Route::get("/login", [AuthController::class, "getLogin"])->name("login"); 
    Route::post("/login", [AuthController::class, "postLogin"])->name("post.login"); 
});

Route::get('/Dasbor', [DasborController::class, 'showDasbor'])->name('dasbor');