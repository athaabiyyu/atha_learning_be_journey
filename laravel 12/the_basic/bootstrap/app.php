<?php

use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\First;
use App\Http\Middleware\Second;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    // Global Middleware
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(EnsureTokenIsValid::class);
    })

    // Middleware Groups
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('custom-group', [
            First::class,
            Second::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
