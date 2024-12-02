<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PasienController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/data-pasien', [PasienController::class, 'index'])->name('data.pasien');
    Route::get('/data-pasien/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('/data-pasien/store', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/data-pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/data-pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::delete('/data-pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
});
