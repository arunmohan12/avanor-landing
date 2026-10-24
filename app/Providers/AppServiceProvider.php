<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ErrorAlertService;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot(): void
    {

    RateLimiter::for('landing-leads', function (Request $request) {
        return [
            // Maximum 5 submissions per IP every 10 minutes.
            Limit::perMinutes(10, 5)
                ->by('landing-leads:ip:' . $request->ip()),

            // Maximum 100 submissions across the site every 10 minutes.
            Limit::perMinutes(10, 100)
                ->by('landing-leads:global'),
        ];
    });

        Queue::failing(function (JobFailed $event): void {
            $payload = $event->job->payload();
            $jobName = $payload['displayName']
                ?? $payload['job']
                ?? 'Unknown queued job';
                if (str_contains($jobName, 'SyncLeadToGoogleSheets')) {
                       return;
                    }
            Log::error('A queued job has permanently failed.', [
                'job' => $jobName,
                'connection' => $event->connectionName,
                'queue' => $event->job->getQueue(),
                'exception' => $event->exception->getMessage(),
            ]);

            try {
                app(ErrorAlertService::class)->send(
                    'Queued job permanently failed',
                    'A queued job has failed and requires investigation.',
                    [
                        'job' => $jobName,
                        'connection' => $event->connectionName,
                        'queue' => $event->job->getQueue(),
                        'error' => $event->exception->getMessage(),
                        'environment' => app()->environment(),
                        'timestamp' => now()->toDateTimeString(),
                    ]
                );
            } catch (Throwable $exception) {
                // Alert failures must not disrupt queue processing.
                Log::critical('Queue failure alert could not be processed.', [
                    'error' => $exception->getMessage(),
                ]);
            }
        });
    }
}
