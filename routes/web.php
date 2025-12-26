<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\JenisKebaikanController;
use App\Http\Controllers\JenisPelanggaranController;
use App\Http\Controllers\kebaikanController;
use App\Http\Controllers\PelanggaranController;

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

    // Dashboard Petugas (POIN)
    Route::middleware('role:petugas')->group(function () {

        //kebaikan
        Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])
            ->name('dashboard.petugas');

        Route::get('/master/kebaikan', [JenisKebaikanController::class, 'index'])
            ->name('kebaikan.index');
    
        Route::get('/master/kebaikan/create', [JenisKebaikanController::class, 'create'])
            ->name('kebaikan.create');
    
        Route::post('/master/kebaikan', [JenisKebaikanController::class, 'store'])
            ->name('kebaikan.store');
    
        Route::get('/master/kebaikan/{kebaikan}/edit', [JenisKebaikanController::class, 'edit'])
            ->name('kebaikan.edit');
    
        Route::put('/master/kebaikan/{kebaikan}', [JenisKebaikanController::class, 'update'])
            ->name('kebaikan.update');
    
        Route::delete('/master/kebaikan/{kebaikan}', [JenisKebaikanController::class, 'destroy'])
            ->name('kebaikan.destroy');
        
            Route::get('/master/pelanggaran', [JenisPelanggaranController::class, 'index'])
        ->name('pelanggaran.index');

        //pelanggaran
        Route::get('/master/pelanggaran/create', [JenisPelanggaranController::class, 'create'])
            ->name('pelanggaran.create');

        Route::post('/master/pelanggaran', [JenisPelanggaranController::class, 'store'])
            ->name('pelanggaran.store');

        Route::get('/master/pelanggaran/{pelanggaran}/edit', [JenisPelanggaranController::class, 'edit'])
            ->name('pelanggaran.edit');

        Route::put('/master/pelanggaran/{pelanggaran}', [JenisPelanggaranController::class, 'update'])
            ->name('pelanggaran.update');

        Route::delete('/master/pelanggaran/{pelanggaran}', [JenisPelanggaranController::class, 'destroy'])
            ->name('pelanggaran.destroy');

        //input
        Route::get('/inputkebaikan/create', [KebaikanController::class, 'create'])
            ->name('inputkebaikan.create');
        
        Route::post('/inputkebaikan', [KebaikanController::class, 'store'])
            ->name('inputkebaikan.store');

        Route::get('/inputpelanggaran/create', [PelanggaranController::class, 'create'])
            ->name('inputpelanggaran.create');
        
        Route::post('/inputpelanggaran', [PelanggaranController::class, 'store'])
            ->name('inputpelanggaran.store');
        
    });

    // Dashboard Guru
    Route::get('/dashboard/guru', [DashboardController::class, 'guru'])
        ->name('dashboard.guru')
        ->middleware('role:guru');

    // Dashboard Siswa
    Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])
        ->name('dashboard.siswa')
        ->middleware('role:siswa');
    /*
    |--------------------------------------------------------------------------
    | CRUD Data Siswa
    |--------------------------------------------------------------------------
    */
    Route::resource('datasiswa', DataSiswaController::class);

});
