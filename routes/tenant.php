<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\MainController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\ScopeSessions;

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
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
    // ScopeSessions::class
])->name('tenant.')->group(function () {

    // Main Routes
    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
    
});
