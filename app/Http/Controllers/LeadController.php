<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Controllers;

use App\Http\Resources\LeadResource;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Jobs\SyncLeadToGoogleSheets;

class LeadController extends Controller
{
    public function show(Lead $lead): LeadResource
    {
        $lead->load([
            'developer:id,name',
            'property:id,name',
        ]);

        return new LeadResource($lead);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => [
                'nullable',
                'exists:properties,id',
            ],

            'developer_id' => [
                'nullable',
                'exists:developers,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
                'unique:leads,phone',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:leads,email',
            ],

            'budget' => [
                'nullable',
                'string',
                'max:255',
            ],

            'source' => [
                'nullable',
                'string',
                'max:100',
            ],
            'message' => [
                'nullable',
                'string',
                'max:2000',
            ],
            'utm_source' => ['nullable', 'string', 'max:255'],
            'utm_medium' => ['nullable', 'string', 'max:255'],
            'utm_campaign' => ['nullable', 'string', 'max:255'],
            'utm_content' => ['nullable', 'string', 'max:255'],
            'utm_term' => ['nullable', 'string', 'max:255'],

            'gclid' => ['nullable', 'string', 'max:255'],
            'fbclid' => ['nullable', 'string', 'max:255'],

            'page_url' => ['nullable', 'string', 'max:1000'],

        ], [
            'phone.unique' => 'This mobile number has already been registered with us.',
            'email.unique' => 'This email address has already been registered with us.',
        ]);

        Lead::create($validated);

        return back()->with(
            'lead_success',
            'Thank you. Our property advisor will contact you shortly.'
        );
    }

    public function storeLanding(Request $request)
    {
        $validated = $request->validate([
            'property_id' => [
                'nullable',
                'exists:properties,id',
            ],

            'developer_id' => [
                'nullable',
                'exists:developers,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
                'unique:leads,phone',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
                'unique:leads,email',
            ],

            'budget' => [
                'nullable',
                'string',
                'max:255',
            ],

            'source' => [
                'nullable',
                'string',
                'max:100',
            ],

            'message' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'utm_source' => ['nullable', 'string', 'max:255'],
            'utm_medium' => ['nullable', 'string', 'max:255'],
            'utm_campaign' => ['nullable', 'string', 'max:255'],
            'utm_content' => ['nullable', 'string', 'max:255'],
            'utm_term' => ['nullable', 'string', 'max:255'],

            'gclid' => ['nullable', 'string', 'max:255'],
            'fbclid' => ['nullable', 'string', 'max:255'],

            'page_url' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ], [
            'phone.unique' => 'This mobile number has already been registered with us.',

            'email.unique' => 'This email address has already been registered with us.',
        ]);

        Lead::create($validated);

        return redirect()
            ->route('landing.thank-you');
    }

    public function storeLandingV2(Request $request)
    {
        $validated = $request->validate([
            'property_id' => [
                'nullable',
                'exists:properties,id',
            ],

            'developer_id' => [
                'nullable',
                'exists:developers,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
                'regex:/^\+\d{6,29}$/',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'bedroom_type' => [
                'required',
                'string',
                'max:255',
            ],

            'budget' => [
                'nullable',
                'string',
                'max:255',
            ],

            'source' => [
                'nullable',
                'string',
                'max:100',
            ],

            'message' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'utm_source' => [
                'nullable',
                'string',
                'max:255',
            ],

            'utm_medium' => [
                'nullable',
                'string',
                'max:255',
            ],

            'utm_campaign' => [
                'nullable',
                'string',
                'max:255',
            ],

            'utm_content' => [
                'nullable',
                'string',
                'max:255',
            ],

            'utm_term' => [
                'nullable',
                'string',
                'max:255',
            ],

            'gclid' => [
                'nullable',
                'string',
                'max:255',
            ],

            'fbclid' => [
                'nullable',
                'string',
                'max:255',
            ],

            'page_url' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ], [
            'phone.required' => 'Please enter your mobile number.',
            'phone.regex' => 'Please enter a valid mobile number.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
        ]);



            // Attempt 1: Save to the database.
    try {
        $lead = Lead::create($validated);
    } catch (\Throwable $exception) {
        $databaseError = $exception->getMessage();

        Log::error('Lead database insert failed.', [
            'phone' => $validated['phone'],
            'error' => $databaseError,
        ]);
    }

    // 2. Queue the Google Sheets sync.
    try {
        SyncLeadToGoogleSheets::dispatch(
            $lead->id,
            $request->ip()
        )->onQueue('default');
    } catch (\Throwable $exception) {
        Log::error('Failed to queue Google Sheets lead sync.', [
            'lead_id' => $lead->id,
            'error' => $exception->getMessage(),
        ]);

        return back()
            ->withInput()
            ->with('lead_error', 'Your enquiry was saved, but syncing is delayed. Please contact our team if needed.');
    }



        
        try {
            Http::withHeaders([
                'X-Internal-Secret' => config('services.internal.secret'),
            ])->post(
                rtrim(config('services.avanor_api_url'), '/')
                    . "/internal/leads/{$lead->id}/notify"
            )->throw();
        } catch (\Throwable $exception) {
            Log::error('Failed to trigger lead notification.', [
                'lead_id' => $lead->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return redirect()
            ->route('landing.thank-you');
    }
}
