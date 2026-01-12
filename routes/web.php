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
use App\Http\Controllers\Petugas\InputPelanggaranController;
use App\Http\Controllers\Petugas\InputPrestasiController;

/*
|--------------------------------------------------------------------------
| Landing & Auth
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan');

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

        Route::resource('databk', BKController::class);
        Route::resource('datapetugas', PetugasController::class);
        Route::resource('datakelas', KelasController::class)
            ->parameters(['datakelas' => 'kelas']);

        Route::resource('walikelas', WaliKelasController::class)
            ->parameters(['walikelas' => 'walikelas']);

        Route::resource('datasiswa', SiswaController::class);
        Route::resource('jenisprestasi', JenisPrestasiController::class);
        Route::resource('jenispelanggaran', JenisPelanggaranController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | PELANGGARAN (GLOBAL)
    |--------------------------------------------------------------------------
    */
    Route::get('/pelanggaran', [PelanggaranController::class, 'index'])
        ->name('pelanggaran.index');

    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/pelanggaran/create', [PelanggaranController::class, 'create'])
            ->name('pelanggaran.create');
        Route::post('/pelanggaran', [PelanggaranController::class, 'store'])
            ->name('pelanggaran.store');
    });

    Route::middleware('role:admin,bk')->group(function () {
        Route::patch(
            '/pelanggaran/{pelanggaran}/verifikasi',
            [PelanggaranController::class, 'verifikasi']
        )->name('pelanggaran.verifikasi');
    });

    /*
    |--------------------------------------------------------------------------
    | PRESTASI (GLOBAL)
    |--------------------------------------------------------------------------
    */
    Route::get('/prestasi', [PrestasiController::class, 'index'])
        ->name('prestasi.index');

    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/prestasi/create', [PrestasiController::class, 'create'])
            ->name('prestasi.create');
        Route::post('/prestasi', [PrestasiController::class, 'store'])
            ->name('prestasi.store');
    });

    Route::middleware('role:admin,bk')->group(function () {
        Route::patch(
            '/prestasi/{prestasi}/verifikasi',
            [PrestasiController::class, 'verifikasi']
        )->name('prestasi.verifikasi');
    });

    /*
    |--------------------------------------------------------------------------
    | PETUGAS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:petugas')->group(function () {

        Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])
            ->name('dashboard.petugas');

        Route::get('/petugas/siswa', [SiswaController::class, 'index'])
            ->name('petugas.siswa');

        // INPUT PELANGGARAN
        Route::get('/petugas/pelanggaran/create',
            [InputPelanggaranController::class, 'create']
        )->name('inputpelanggaran.create');

        Route::post('/petugas/pelanggaran',
            [InputPelanggaranController::class, 'store']
        )->name('inputpelanggaran.store');

        Route::get('/petugas/pelanggaran',
            [InputPelanggaranController::class, 'index']
        )->name('petugas.pelanggaran');

        // INPUT PRESTASI
        Route::get('/petugas/prestasi/create',
            [InputPrestasiController::class, 'create']
        )->name('inputprestasi.create');

        Route::post('/petugas/prestasi',
            [InputPrestasiController::class, 'store']
        )->name('inputprestasi.store');

        Route::get('/petugas/prestasi',
            [InputPrestasiController::class, 'index']
        )->name('petugas.prestasi');
    });

    /*
    |--------------------------------------------------------------------------
    | BK
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:bk')->group(function () {

        Route::get('/bk/dashboard', [DashboardController::class, 'bk'])
            ->name('dashboard.bk');

        Route::get('/bk/siswa', [SiswaController::class, 'index'])
            ->name('bk.siswa');

        Route::get('/bk/pelanggaran', [PelanggaranController::class, 'index'])
            ->name('bk.pelanggaran');

        Route::get('/bk/prestasi', [PrestasiController::class, 'index'])
            ->name('bk.prestasi');
    });

    /*
    |--------------------------------------------------------------------------
    | WALI KELAS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:wali_kelas')->group(function () {

        Route::get('/dashboard/wali-kelas', [DashboardController::class, 'wali_kelas'])
            ->name('dashboard.wali_kelas');

        Route::get('/wali-kelas/siswa', [SiswaController::class, 'index'])
            ->name('wali.siswa');

        Route::get('/wali-kelas/pelanggaran', [PelanggaranController::class, 'index'])
            ->name('wali.pelanggaran');

        Route::get('/wali-kelas/prestasi', [PrestasiController::class, 'index'])
            ->name('wali.prestasi');

        Route::get('/wali-kelas/rekap', [DashboardController::class, 'waliRekap'])
            ->name('wali.rekap');
    });

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:siswa')->group(function () {

        Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])
            ->name('dashboard.siswa');

        Route::get('/siswa/pelanggaran', [PelanggaranController::class, 'siswaIndex'])
            ->name('siswa.pelanggaran');

        Route::get('/siswa/prestasi', [PrestasiController::class, 'siswaIndex'])
            ->name('siswa.prestasi');
    });

}); // ⬅️ PENUTUP AUTH (WAJIB)
