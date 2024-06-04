<?php

use App\Http\Middleware\RemoveTokenMiddleware;
use App\Http\Middleware\UpperCustomMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedOnDomainException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(UpperCustomMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (TenantCouldNotBeIdentifiedOnDomainException $e, Request $request) {
            return view('urlerror');
        });
    })->create();
