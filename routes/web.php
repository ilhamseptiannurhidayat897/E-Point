<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BKController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KelasController;


/*
|--------------------------------------------------------------------------
| Landing & Auth
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    //Admin
    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard.admin');
    //Data BK
    Route::get('/admin/bk', [BKController::class, 'index'])->name('databk.index');
    Route::get('/admin/bk/create', [BKController::class, 'create'])->name('databk.create');
    Route::post('/admin/bk', [BKController::class, 'store'])->name('databk.store');
    Route::get('/admin/bk/{id}/edit', [BKController::class, 'edit'])->name('databk.edit');
    Route::put('/admin/bk/{id}', [BKController::class, 'update'])->name('databk.update');
    Route::delete('/admin/bk/{id}', [BKController::class, 'destroy'])->name('databk.destroy');
    //Data Petugas
    Route::resource('datapetugas', PetugasController::class);
    //Data Kelas
    Route::resource('datakelas', KelasController::class);

});


    // Dashboard Petugas (POIN)
    Route::middleware('role:petugas')->group(function () {

        //kebaikan
        Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])
            ->name('dashboard.petugas');

    });

    });
    Route::middleware(['auth', 'role:bk'])->group(function () {
        Route::get('/bk/dashboard', [DashboardController::class, 'bk'])
            ->name('dashboard.bk');
    });
    // Dashboard Guru
    Route::get('/dashboard/wali_kelas', [DashboardController::class, 'wali_kelas'])
        ->name('dashboard.wali_kelas')
        ->middleware('role:wali_kelas');

    // Dashboard Siswa
    Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])
        ->name('dashboard.siswa')
        ->middleware('role:siswa');

