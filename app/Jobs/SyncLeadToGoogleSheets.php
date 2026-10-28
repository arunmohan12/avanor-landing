<?php

namespace App\Jobs;

use App\Models\Lead;
use App\Services\GoogleSheetsLeadService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class SyncLeadToGoogleSheets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 5;

    public array $backoff = [10, 30, 60, 180];

public function __construct(
    public int $leadId,
    public ?string $ipAddress = null,
        public ?string $interestedIn = null
) {}


public function handle(GoogleSheetsLeadService $sheets): void
{
    $lead = Lead::with(['property.project', 'property.developer'])
        ->find($this->leadId);

    if (! $lead) {
        Log::warning('Google Sheets sync skipped: lead not found.', [
            'lead_id' => $this->leadId,
        ]);

        return;
    }

    $propertyName = trim(implode(' | ', array_filter([
        $lead->property?->project?->name,
        $lead->property?->developer?->name,
    ])));


    $sheets->appendLead([
        $propertyName,
         $lead->created_at?->format('Y-m-d') ?? '',
        $lead->created_at?->format('H:i:s') ?? '',
        $lead->source,
        $lead->name,
        $lead->email ?? '',
        $lead->phone,
        $this->interestedIn ?? '',
        $lead->bedroom_type ?? '',
        $lead->budget ?? '',
        '',
        $this->ipAddress ?? '',
        $lead->gclid ?? '',
    $lead->utm_source ?? '',
    $lead->utm_medium ?? '',
    $lead->utm_campaign ?? '',
    ]);
}




/**
 * Handle a job that has exhausted all retry attempts.
 */
public function failed(Throwable $exception): void
{
    Log::error('Google Sheets lead sync permanently failed.', [
        'lead_id' => $this->leadId,
        'error' => $exception->getMessage(),
    ]);

    $lead = Lead::find($this->leadId);

    app(\App\Services\ErrorAlertService::class)->send(
        'Google Sheets lead sync permanently failed',
        'A lead could not be synchronized to Google Sheets after all retry attempts.',
        [
            'lead_id' => $this->leadId,
            'name' => $lead?->name,
            'phone' => $lead?->phone,
            'email' => $lead?->email,
            'bedroom_type' => $lead?->bedroom_type,
            'page_url' => $lead?->page_url,
            'error' => $exception->getMessage(),
            'attempts' => $this->tries,
            'environment' => app()->environment(),
            'timestamp' => now()->toDateTimeString(),
        ]
    );
}




}


