<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ErrorAlertService
{
    public function send(
        string $subject,
        string $message,
        array $context = []
    ): void {
        $recipient = config('app.error_alert_email');

        if (! $recipient) {
            Log::critical('Error alert recipient is not configured.', [
                'subject' => $subject,
            ]);

            return;
        }

        try {
            $contextJson = json_encode(
                $context,
                JSON_PRETTY_PRINT | JSON_PARTIAL_OUTPUT_ON_ERROR
            );

            $environment = strtoupper(app()->environment());

            Mail::raw(
                $message . "\n\nContext:\n" . ($contextJson ?: '{}'),
                function ($mail) use ($recipient, $subject, $environment) {
                    $mail->to($recipient)
                        ->subject("[Avanor {$environment}] {$subject}");
                }
            );
        } catch (Throwable $exception) {
            Log::critical('Unable to send error alert email.', [
                'subject' => $subject,
                'error' => $exception->getMessage(),
            ]);
        }
    }
}
