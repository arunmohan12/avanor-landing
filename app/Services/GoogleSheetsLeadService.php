<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheetsLeadService
{
    public function appendLead(array $row): void
    {
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

        $client = new Client();
        $client->setApplicationName('Avanor Lead Integration');
        $client->setAuthConfig($credentials);
        $client->setScopes([
            Sheets::SPREADSHEETS,
        ]);

        $service = new Sheets($client);

        $values = new ValueRange([
            'values' => [$row],
        ]);

        $service->spreadsheets_values->append(
            $spreadsheetId,
            "'" . str_replace("'", "''", $worksheet) . "'!A:N",
            $values,
            [
                'valueInputOption' => 'RAW',
                'insertDataOption' => 'INSERT_ROWS',
            ]
        );
    }
}