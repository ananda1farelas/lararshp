<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthRoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Tambahkan PreventBackHistory ke grup web TANPA menimpa default-nya
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\PreventBackHistory::class,
        ]);

        // Alias middleware lain tetap
        $middlewrole' => \Appare->alias([
            'auth.\Http\Middleware\AuthRoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
    
