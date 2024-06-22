<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\ScopeSessions;
use App\Http\Controllers\Tenant\MainController;
use App\Http\Controllers\Tenant\PostController;
use App\Http\Controllers\Tenant\CommentController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
    ScopeSessions::class
])->name('tenant.')->group(function () {

    // Main Routes
    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'index')->name('home');

        // protected tenant administrator routes
        Route::middleware(['auth'])->group(function () {

        });
    });

    // Post Routes
    Route::resource('posts', PostController::class);

    // Comment Routes
    Route::apiResource('posts.comments', CommentController::class);



});
