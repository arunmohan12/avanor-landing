<?php

namespace App\Services;

class ThankYouPageService
{
    /**
     * Map property IDs to thank-you page views.
     */
    private array $propertyViews = [
        25 => 'thankyoupages.ora-thank-you',
        16 => 'thankyoupages.hayat-thank-you',
    ];

    /**
     * Select the thank-you page view based on property ID.
     */
    public function selectView(?int $propertyId): string
    {
        return $this->propertyViews[$propertyId] ?? 'thank-you';
    }
}