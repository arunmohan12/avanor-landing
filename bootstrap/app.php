<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
   ->withMiddleware(function (Middleware $middleware): void {
    $middleware->web(append: [
        \App\Http\Middleware\CaptureCampaignParameters::class,
    ]);
})
 ->withExceptions(function (Exceptions $exceptions): void {
        // Preserve the existing JSON response behavior.
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*')
                || $request->expectsJson(),
        );

        // Alert when Laravel reports an application exception.
        $exceptions->report(function (Throwable $exception): void {
            app(\App\Services\ErrorAlertService::class)->send(
                'Unexpected application exception',
                'Laravel reported an application exception.',
                [
                    'exception' => get_class($exception),
                    'error' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'environment' => app()->environment(),
                    'timestamp' => now()->toDateTimeString(),
                ]
            );
        });
    })


    ->create();
