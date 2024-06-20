<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Central\AuthController;

Route::view('/home', 'index')->name('central.home');
Route::view('/login', 'login')->name('central.login');
Route::view('/register', 'register')->name('central.register');
Route::view('/reset', 'reset')->name('central.register');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('central.login');
    Route::post('/register', 'register')->name('central.register');
    Route::post('/reset', 'reset')->name('central.reset');
});

// Route::controller();
