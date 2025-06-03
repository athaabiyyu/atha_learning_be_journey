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
    
    ->withMiddleware(function (Middleware $middleware) {

        // Global Middleware
        $middleware->append(EnsureTokenIsValid::class);

        // Middleware Groups
        $middleware->appendToGroup('custom-group', [
            First::class,
            Second::class,
        ]);

        // Middleware Aliases
        $middleware->alias(['token', EnsureTokenIsValid::class]);
        $middleware->alias(['first', First::class]);
        $middleware->alias(['second', Second::class]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
