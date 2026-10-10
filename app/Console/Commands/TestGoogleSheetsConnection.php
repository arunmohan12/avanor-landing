<?php

namespace App\Console\Commands;

use Google\Client;
use Google\Service\Sheets;
use Illuminate\Console\Command;
use Throwable;

class TestGoogleSheetsConnection extends Command
{
    protected $signature = 'google-sheets:test';

    protected $description = 'Test the connection to Google Sheets';

    public function handle(): int
    {
        try {
            $credentials = base_path(
                config('services.google_sheets.credentials')
            );

            $spreadsheetId = config(
                'services.google_sheets.spreadsheet_id'
            );

            $worksheet = config(
                'services.google_sheets.worksheet',
                'Sheet1'
            );

            if (! file_exists($credentials)) {
                $this->error('Google credentials file was not found.');
                return self::FAILURE;
            }

            $client = new Client();
            $client->setApplicationName('Avanor Lead Integration');
            $client->setAuthConfig($credentials);
            $client->setScopes([
                Sheets::SPREADSHEETS_READONLY,
            ]);

            $service = new Sheets($client);

            $range = $worksheet . '!A1:Z1';

            $response = $service->spreadsheets_values->get(
                $spreadsheetId,
                $range
            );

            $headers = $response->getValues()[0] ?? [];

            $this->info('Google Sheets connection successful.');

            if (empty($headers)) {
                $this->warn(
                    'The worksheet is empty. Add your column headings in row 1.'
                );
            } else {
                $this->info('Headers found in the worksheet:');
                $this->line(implode(' | ', $headers));
            }

            return self::SUCCESS;
        } catch (Throwable $e) {
            $this->error('Google Sheets connection failed.');
            $this->line($e->getMessage());

            return self::FAILURE;
        }
    }
}