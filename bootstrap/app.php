<?php

use App\Http\Middleware\EnsureApiRequestIsValid;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('api')
                ->prefix('api/v1')
                ->as('api.')
                ->group(base_path('routes/api.php'));

        },


    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->api(EnsureApiRequestIsValid::class);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
