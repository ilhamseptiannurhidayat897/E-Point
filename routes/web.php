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
use App\Http\Controllers\BK\SiswaController as BKSiswa;
use App\Http\Controllers\WaliKelas\SiswaController as WaliSiswa;
use App\Http\Controllers\Siswa\ProfilController;
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

        // Siswa
        Route::resource('datasiswa', SiswaController::class);

        // Kelas
        Route::resource('datakelas', KelasController::class)
            ->parameters(['datakelas' => 'kelas']);

        // Wali Kelas
        Route::resource('walikelas', WaliKelasController::class)
            ->parameters(['walikelas' => 'walikelas']);

        Route::resource('datasiswa', SiswaController::class);

        // Jenis Prestasi

        Route::resource('jenisprestasi', JenisPrestasiController::class);
        Route::resource('jenispelanggaran', JenisPelanggaranController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | PELANGGARAN (GLOBAL)
    |--------------------------------------------------------------------------
    */

});

    // LIHAT DATA (SEMUA ROLE)
    Route::get('/pelanggaran', [PelanggaranController::class, 'index'])
        ->name('pelanggaran.index');

    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/pelanggaran/create', [PelanggaranController::class, 'create'])
            ->name('pelanggaran.create');
        Route::post('/pelanggaran', [PelanggaranController::class,'store']
        )->name('pelanggaran.store');
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

    Route::middleware(['auth','role:admin'])->group(function () {
        Route::resource('datasiswa', SiswaController::class);
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

    Route::middleware(['auth','role:bk'])
        ->prefix('bk')
        ->name('bk.')
        ->group(function () {

        // DASHBOARD BK
        Route::get('dashboard', [DashboardController::class, 'bk'])
            ->name('dashboard');

        // DATA SISWA
        Route::get('siswa', [BKSiswa::class, 'index'])
            ->name('siswa.index');

        Route::get('siswa/{siswa}', [BKSiswa::class, 'show']
        )->name('siswa.show');

        // PELANGGARAN
        Route::get('pelanggaran', [PelanggaranController::class, 'index'])
            ->name('pelanggaran.index');

        // PRESTASI
        Route::get('prestasi', [PrestasiController::class, 'index'])
            ->name('prestasi.index');
    });
    /*
    |--------------------------------------------------------------------------
    | WALI KELAS
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth','role:wali_kelas'])
        ->prefix('wali-kelas')
        ->name('wali_kelas.')
        ->group(function () {

            Route::get('dashboard', [DashboardController::class, 'wali_kelas'])
                ->name('dashboard');

            Route::get('siswa', [WaliSiswa::class, 'index'])
                ->name('siswa.index');

            Route::get('siswa/{siswa}', [WaliSiswa::class, 'show'])
                ->name('siswa.show');

        // PELANGGARAN
        Route::get('pelanggaran', [PelanggaranController::class, 'index'])
            ->name('pelanggaran.index');

        // PRESTASI
        Route::get('prestasi', [PrestasiController::class, 'index'])
            ->name('prestasi.index');

        // REKAP (opsional)
        Route::get('rekap', [DashboardController::class, 'waliRekap'])
            ->name('rekap');
    });
    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth','role:siswa'])->group(function () {

        Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])
            ->name('dashboard.siswa');

        Route::get('/siswa/pelanggaran', [PelanggaranController::class, 'siswaIndex'])
            ->name('siswa.pelanggaran');

        Route::get('/siswa/prestasi', [PrestasiController::class, 'siswaIndex'])
            ->name('siswa.prestasi');

            Route::get('/profil-saya', [ProfilController::class, 'index'])
                ->name('siswa.profil');

            Route::get('/profil-saya/edit', [ProfilController::class, 'edit'])
                ->name('siswa.profil.edit');

            Route::put('/profil-saya', [ProfilController::class, 'update'])
                ->name('siswa.profil.update');
    });

