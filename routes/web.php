<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('students', StudentController::class);
Route::resource('violations', ViolationController::class);
Route::resource('violation-types', ViolationTypeController::class);
Route::resource('good-points', GoodPointController::class);
Route::resource('good-point-types', GoodPointTypeController::class);
