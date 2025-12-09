<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoodPointController;
use App\Http\Controllers\GoodPointTypeController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ViolationTypeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('index');
});
Route::resource('students', StudentController::class);
Route::resource('violations', ViolationController::class);
Route::resource('violation-types', ViolationTypeController::class);
Route::resource('good-points', GoodPointController::class);
Route::resource('good-point-types', GoodPointTypeController::class);


// Routes Authentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes untuk Officer
Route::middleware(['auth', 'role:petugas'])
    ->prefix('officer')
    ->name('officer.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('officer.dashboard');
        })->name('dashboard');
    });


// Routes untuk Teacher
Route::middleware(['auth', 'role:guru'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('teacher.dashboard');
        })->name('dashboard');
    });


// Routes untuk Siswa
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->group(function () {
    Route::get('/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');
});
