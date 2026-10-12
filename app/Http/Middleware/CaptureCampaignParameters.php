<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaptureCampaignParameters
{
    private const PARAMETERS = [
        'gclid',
        'utm_source',
        'utm_medium',
        'utm_campaign',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // Capture first-touch attribution only.
        foreach (self::PARAMETERS as $parameter) {
            $sessionKey = "campaign.$parameter";

            // Preserve a previously captured value.
            if ($request->session()->has($sessionKey)) {
                continue;
            }

            $value = $request->query($parameter);

            if (is_string($value) && trim($value) !== '') {
                $request->session()->put(
                    $sessionKey,
                    trim($value)
                );
            }
        }

        return $next($request);
    }
}
