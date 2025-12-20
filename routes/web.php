<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DataSiswaController;

// Halaman Landing Page (Publik)
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman Dashboard (dengan middleware auth)
Route::middleware(['auth'])->group(function () {
    // Dashboard Petugas
    Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])->name('dashboard')->middleware('role:petugas');
    
    // Dashboard Guru
    Route::get('/dashboard/guru', [DashboardController::class, 'guru'])->name('dashboard.guru.dashboard')->middleware('role:guru');
    
    // Dashboard Siswa
    Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])->name('dashboard.siswa')->middleware('role:siswa');

    Route::get('/laporan', [DashboardController::class, 'riwayatPoin'])
    ->name('siswa.riwayat')
    ->middleware('auth');

    
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// CRUD Data Siswa
Route::middleware(['auth'])->group(function () {

    Route::resource('datasiswa', DataSiswaController::class);
});