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
use App\Http\Controllers\BK\ProfilController as BKProfil;
use App\Http\Controllers\WaliKelas\SiswaController as WaliSiswa;
use App\Http\Controllers\WaliKelas\ProfilController as WaliProfil;
use App\Http\Controllers\Siswa\ProfilController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\Petugas\InputPelanggaranController;
use App\Http\Controllers\Petugas\InputPrestasiController;
use App\Http\Controllers\Petugas\ProfilController as PetugasProfil;
use App\Http\Controllers\BK\VerifikasiPelanggaranController;
use App\Http\Controllers\BK\VerifikasiPrestasiController;
use App\Http\Controllers\Siswa\PelanggaranController as SiswaPelanggaran;
use App\Http\Controllers\Siswa\PrestasiController as SiswaPrestasi;
use App\Http\Controllers\Admin\KelasImportController;
use App\Http\Controllers\Admin\WaliKelasImportController;
use App\Http\Controllers\Admin\SiswaImportController;
use App\Http\Controllers\Admin\JenisPrestasiImportController;
use App\Http\Controllers\Admin\JenisPelanggaranImportController;
use App\Http\Controllers\Admin\SiswaPdfController as AdminSiswaPdf;
use App\Http\Controllers\Admin\SiswaExportController;
use App\Http\Controllers\BK\SiswaPdfController as BKSiswaPdf;
use App\Http\Controllers\WaliKelas\SiswaPdfController as WaliSiswaPdf;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard.admin');

            Route::get('/dashboard/check-new-data', [DashboardController::class, 'checkNewData'])
    ->name('dashboard.check-new-data');


        /*
        |--------------------------------------------------------------------------
        | MASTER DATA
        |--------------------------------------------------------------------------
        */
        Route::resource('databk', BKController::class);
        Route::resource('datapetugas', PetugasController::class);
        Route::resource('datasiswa', SiswaController::class);

        Route::resource('datakelas', KelasController::class)
            ->parameters(['datakelas' => 'kelas']);

        Route::resource('walikelas', WaliKelasController::class)
            ->parameters(['walikelas' => 'walikelas']);

        Route::resource('jenisprestasi', JenisPrestasiController::class);
        Route::resource('jenispelanggaran', JenisPelanggaranController::class);

        /*
        |--------------------------------------------------------------------------
        | PELANGGARAN (ADMIN ONLY)
        |--------------------------------------------------------------------------
        */
        Route::get('/pelanggaran', [PelanggaranController::class, 'index'])
            ->name('pelanggaran.index');

        Route::get('/pelanggaran/create', [PelanggaranController::class, 'create'])
            ->name('pelanggaran.create');

        Route::post('/pelanggaran', [PelanggaranController::class, 'store'])
            ->name('pelanggaran.store');

        Route::patch('/pelanggaran/{pelanggaran}/verifikasi',
            [PelanggaranController::class, 'verifikasi']
        )->name('pelanggaran.verifikasi');

        /*
        |--------------------------------------------------------------------------
        | PRESTASI (ADMIN ONLY)
        |--------------------------------------------------------------------------
        */
        Route::get('/prestasi', [PrestasiController::class, 'index'])
            ->name('prestasi.index');

        Route::get('/prestasi/create', [PrestasiController::class, 'create'])
            ->name('prestasi.create');

        Route::post('/prestasi', [PrestasiController::class, 'store'])
            ->name('prestasi.store');

        Route::patch('/prestasi/{prestasi}/verifikasi',
            [PrestasiController::class, 'verifikasi']
        )->name('prestasi.verifikasi');
        /*
        |--------------------------------------------------------------------------
        | Import (ADMIN ONLY)
        |--------------------------------------------------------------------------
        */
        Route::get('/kelas/import', [KelasImportController::class, 'index'])
            ->name('datakelas.import');

        Route::post('/kelas/import', [KelasImportController::class, 'store'])
            ->name('datakelas.import.store');

        Route::get('/wali-kelas/import',
            [WaliKelasImportController::class, 'index']
        )->name('walikelas.import');

        Route::post('/wali-kelas/import',
            [WaliKelasImportController::class, 'store']
        )->name('walikelas.import.store');

        Route::get('/siswa/import',
            [SiswaImportController::class, 'index']
        )->name('datasiswa.import');

        Route::post('/siswa/import',
            [SiswaImportController::class, 'store']
        )->name('datasiswa.import.store');

        Route::get('/jenis-prestasi/import',
            [JenisPrestasiImportController::class, 'index']
        )->name('jenisprestasi.import');

        Route::post('/jenis-prestasi/import',
            [JenisPrestasiImportController::class, 'store']
        )->name('jenisprestasi.import.store');

        Route::get('/jenis-pelanggaran/import',
            [JenisPelanggaranImportController::class, 'index']
        )->name('jenispelanggaran.import');

        Route::post('/jenis-pelanggaran/import',
            [JenisPelanggaranImportController::class, 'store']
        )->name('jenispelanggaran.import.store');
        /*
        |--------------------------------------------------------------------------
        | Import (ADMIN ONLY)
        |--------------------------------------------------------------------------
        */
        Route::get('/siswa/export-pdf',
            [AdminSiswaPdf::class, 'export']
        )->name('datasiswa.pdf');

        Route::get('/siswa/export-excel',
            [SiswaExportController::class, 'export']
        )->name('datasiswa.excel');
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

        Route::resource('petugas/pelanggaran', InputPelanggaranController::class)
            ->only(['index','create','store'])
            ->names([
                'index' => 'inputpelanggaran.index',
                'create' => 'inputpelanggaran.create',
                'store' => 'inputpelanggaran.store',
            ]);

        Route::resource('petugas/prestasi', InputPrestasiController::class)
            ->only(['index','create','store'])
            ->names([
                'index' => 'inputprestasi.index',
                'create' => 'inputprestasi.create',
                'store' => 'inputprestasi.store',
            ]);

        Route::get('/petugas/profil', [PetugasProfil::class, 'index'])
            ->name('petugas.profil.index');

        Route::get('/petugas/profil/edit', [PetugasProfil::class, 'edit'])
            ->name('petugas.profil.edit');

        Route::post('/petugas/profil/update', [PetugasProfil::class, 'update'])
            ->name('petugas.profil.update');

    });

    /*
    |--------------------------------------------------------------------------
    | BK
    |--------------------------------------------------------------------------
    */
    Route::prefix('bk')->name('bk.')->middleware('role:bk')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'bk'])->name('dashboard');

        Route::get('pelanggaran', [VerifikasiPelanggaranController::class, 'index'])
            ->name('pelanggaran');

        Route::put('pelanggaran/{id}',
            [VerifikasiPelanggaranController::class, 'verifikasi']
        )->name('pelanggaran.verifikasi');

        Route::get('pelanggaran/riwayat',
            [VerifikasiPelanggaranController::class, 'riwayat']
        )->name('pelanggaran.riwayat');

        Route::get('prestasi', [VerifikasiPrestasiController::class, 'index'])
            ->name('prestasi');

        Route::put('prestasi/{id}',
            [VerifikasiPrestasiController::class, 'verifikasi']
        )->name('prestasi.verifikasi');

        Route::get('prestasi/riwayat',
            [VerifikasiPrestasiController::class, 'riwayat']
        )->name('prestasi.riwayat');

        Route::get('/profil', [BKProfil::class, 'index'])
            ->name('profil');

        Route::get('/profil/edit', [BKProfil::class, 'edit'])
            ->name('profil.edit');

        Route::put('/profil', [BKProfil::class, 'update'])
            ->name('profil.update');

        Route::get('/siswa/export-pdf',
            [BkSiswaPdf::class, 'export']
        )->name('siswa.pdf');
    
        Route::resource('siswa', BKSiswa::class)->only(['index','show']);
    });

    /*
    |--------------------------------------------------------------------------
    | WALI KELAS
    |--------------------------------------------------------------------------
    */
    Route::prefix('wali-kelas')->name('wali_kelas.')
        ->middleware('role:wali_kelas')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'wali_kelas'])
            ->name('dashboard');

        Route::get('pelanggaran', [PelanggaranController::class, 'index'])
            ->name('pelanggaran.index');

        Route::get('prestasi', [PrestasiController::class, 'index'])
            ->name('prestasi.index');

        Route::get('/profil', [WaliProfil::class, 'index'])
        ->name('profil');

        Route::get('/profil/edit', [WaliProfil::class, 'edit'])
            ->name('profil.edit');

        Route::put('/profil', [WaliProfil::class, 'update'])
            ->name('profil.update');

        Route::get('/siswa/export-pdf',
            [WaliSiswaPdf::class, 'export']
        )->name('siswa.pdf');

        Route::resource('siswa', WaliSiswa::class)->only(['index','show']);
    });

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:siswa')->group(function () {

        Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])
            ->name('dashboard.siswa');

        Route::get('pelanggaran', [SiswaPelanggaran::class, 'index'])
            ->name('siswa.pelanggaran');

        Route::get('prestasi', [SiswaPrestasi::class, 'index'])
            ->name('siswa.prestasi');

        Route::get('/profil', [ProfilController::class, 'index'])
            ->name('siswa.profil');

        Route::get('/profil/edit', [ProfilController::class, 'edit'])
            ->name('siswa.profil.edit');

        Route::put('/profil', [ProfilController::class, 'update'])
            ->name('siswa.profil.update');
    });
});
