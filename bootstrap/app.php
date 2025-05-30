<?php

use App\Http\Middleware\FetchUserData;
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
        $middleware->alias([
            'JWTAuth' => \App\Http\Middleware\JWTAuth::class,
            'CheckAuthenticated' => \App\Http\Middleware\CheckAuthenticated::class,
            'FetchUserData'=> \App\Http\Middleware\FetchUserData::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
