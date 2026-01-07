<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BKController;
use App\Http\Controllers\JenisPelanggaranController;
use App\Http\Controllers\JenisPrestasiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\PeraturanController;

/*
|--------------------------------------------------------------------------
| Landing & Auth
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/peraturan', [PeraturanController::class, 'index'])
    ->name('peraturan');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

/*
|--------------------------------------------------------------------------
| Authenticated
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {

        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard.admin');

        // BK
        Route::resource('databk', BKController::class);

        // Petugas
        Route::resource('datapetugas', PetugasController::class);

        // Kelas
        Route::resource('datakelas', KelasController::class)
            ->parameters(['datakelas' => 'kelas']);

        // Wali Kelas
        Route::resource('walikelas', WaliKelasController::class)
        ->parameters([
            'walikelas' => 'walikelas'
        ]);

        // Siswa
        Route::resource('datasiswa', SiswaController::class);

        // Jenis Prestasi
        Route::resource('jenisprestasi', JenisPrestasiController::class);

        // Jenis Pelanggaran
        Route::resource('jenispelanggaran', JenisPelanggaranController::class);

    });

    Route::middleware('auth')->group(function () {

    // LIHAT DATA (SEMUA ROLE)
    Route::get('/pelanggaran', [PelanggaranController::class,'index'])
        ->name('pelanggaran.index');

    // INPUT (ADMIN & PETUGAS)
    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/pelanggaran/create', [PelanggaranController::class,'create'])
            ->name('pelanggaran.create');
        Route::post('/pelanggaran', [PelanggaranController::class,'store'])
            ->name('pelanggaran.store');
    });

    // VERIFIKASI (ADMIN & BK)
    Route::middleware('role:admin,bk')->group(function () {
        Route::patch(
            '/pelanggaran/{pelanggaran}/verifikasi',
            [PelanggaranController::class,'verifikasi']
        )->name('pelanggaran.verifikasi');
    });
});

    Route::middleware('auth')->group(function () {

    // LIHAT DATA (SEMUA ROLE)
    Route::get('/prestasi', [PrestasiController::class,'index'])
        ->name('prestasi.index');

    // INPUT (ADMIN & PETUGAS)
    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/prestasi/create', [PrestasiController::class,'create'])
            ->name('prestasi.create');
        Route::post('/prestasi', [PrestasiController::class,'store'])
            ->name('prestasi.store');
    });

    // VERIFIKASI (ADMIN & BK)
    Route::middleware('role:admin,bk')->group(function () {
        Route::patch(
            '/prestasi/{prestasi}/verifikasi',
            [PrestasiController::class,'verifikasi']
        )->name('prestasi.verifikasi');
    });
});
    /*
    |--------------------------------------------------------------------------
    | PETUGAS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:petugas')->group(function () {
        Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])
            ->name('dashboard.petugas');
    });

    /*
    |--------------------------------------------------------------------------
    | BK
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:bk')->group(function () {
        Route::get('/bk/dashboard', [DashboardController::class, 'bk'])
            ->name('dashboard.bk');
    });

    /*
    |--------------------------------------------------------------------------
    | WALI KELAS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:wali_kelas')->group(function () {
        Route::get('/dashboard/wali-kelas', [DashboardController::class, 'wali_kelas'])
            ->name('dashboard.wali_kelas');
    });

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:siswa')->group(function () {
        Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])
            ->name('dashboard.siswa');
    });

});
