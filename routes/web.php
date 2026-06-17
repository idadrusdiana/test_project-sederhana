<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware(['role:superadmin'])->group(function() {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    });
    Route::middleware(['role:superadmin|store'])->group(function() {
        Route::get('/chart', [HomeController::class, 'chart'])->name('chart');
    });
});