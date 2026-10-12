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
    public ?string $ipAddress = null
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
        'Landing page',
        $lead->name,
        $lead->email ?? '',
        $lead->phone,
        $lead->bedroom_type ?? '',
        '',
        $this->ipAddress ?? '',
        
    ]);
}


    public function failed(?Throwable $exception): void
    {
        Log::error('Google Sheets lead sync permanently failed.', [
            'lead_id' => $this->leadId,
            'error' => $exception?->getMessage(),
        ]);
    }
}
