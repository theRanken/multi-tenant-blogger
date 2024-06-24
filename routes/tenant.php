<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\ScopeSessions;
use App\Http\Controllers\Tenant\MainController;
use App\Http\Controllers\Tenant\PostController;
use App\Http\Controllers\Tenant\CommentController;
use App\Http\Controllers\Tenant\TenantAuthController;
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
    ScopeSessions::class,
    \App\Http\Middleware\ExtractSubdomain::class,
])->group(function () { 

    // Auth routes
    Route::controller(TenantAuthController::class)->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/register', 'register')->name('register');
        Route::get('/logout','logout')->name('logout')->middleware('auth');
    });

    Route::name('tenant.')->group(function () {

        // Main Routes
        Route::middleware(['auth'])->controller(PostController::class)->group(function () {

            // Post Routes
            Route::get('/','index')->name('home')->withoutMiddleware('auth');
            Route::post('/','store')->name('posts.create');
            Route::get('/{post:slug}','show')->name('posts.show')->withoutMiddleware('auth');
            Route::put('/{post:slug}','update')->name('posts.edit');
            Route::delete('/{post:slug}')->name('posts.delete');
            Route::get('/{post:slug}/like', 'like_post')->name('posts.like');

            // Comment Routes
            Route::get('/{post:slug}/comments/','comments')->name('posts.comments')->withoutMiddleware('auth');
            Route::get('/{post:slug}/comments/{comment:slug}','show_comment')->name('posts.comments.show')->withoutMiddleware('auth');
            Route::post('/{post:slug}/comments/','create_comment')->name('posts.comments.create');
            Route::delete('/{post:slug}/comments/','delete_comment')->name('posts.comments.delete');
            
        });

    });



});
