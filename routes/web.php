<?php

use App\Http\Controllers\Central\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Central\AuthController;

Route::view('/', 'index')->name('home');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::view('/reset', 'reset')->name('register');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/reset', 'reset')->name('reset');
    Route::get('/logout','logout')->name('logout')->middleware('auth');
});

Route::middleware(['auth'])
->prefix('app')
->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('app.dashboard');
    // Route::view('','')->name('');
});

// Route::controller();
