<?php

namespace App\Jobs;

use App\Services\GoogleSheetsLeadService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class TestGoogleSheetsQueueJob implements ShouldQueue
{
    use Queueable;

    public function handle(GoogleSheetsLeadService $sheets): void
    {
        $sheets->appendLead([
            'TEST - Queue Integration',
            'queue_test',
            'Dummy Contact',
            'queue-test@example.com',
            '+971500000000',
            'Test Property',
            '',
            '127.0.0.1',
        ]);

        Log::info('Google Sheets queue test completed successfully.');
    }
}
