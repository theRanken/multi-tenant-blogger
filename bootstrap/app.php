<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function(){
            foreach (config('tenancy.central_domains') as $domain) {
                Route::middleware('web')
                ->domain($domain)
                ->group(base_path('routes/web.php'));
            }

            Route::middleware(['web'])->group(base_path('routes/tenant.php'));
        },
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
