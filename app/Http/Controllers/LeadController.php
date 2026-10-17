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


        Log::info('Landing page lead form submitted', [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'bedroom_type' => $request->input('bedroom_type'),

            'url' => $request->input('page_url') ?? $request->fullUrl(),
            'time' => now()->toDateTimeString(),
        ]);



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
            'interested_in' => [
                'nullable',
                'string',
                \Illuminate\Validation\Rule::in([
                    'Address Tierra',
                    'Palace Ostra',
                    'Mareva',
                    'Not sure',
                ]),
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

        foreach (
            [
                'gclid',
                'utm_source',
                'utm_medium',
                'utm_campaign',
            ] as $parameter
        ) {
            $validated[$parameter] = $request->session()->get(
                "campaign.$parameter"
            );
        }

        $interestedIn = $validated['interested_in'] ?? null;

        // Attempt 1: Save to the database.
        try {
            $lead = Lead::create($validated);
        } catch (\Throwable $exception) {
            Log::error('Lead database insert failed.', [
                'error' => $exception->getMessage(),
                'environment' => app()->environment(),
            ]);

            app(\App\Services\ErrorAlertService::class)->send(
                'Lead database insertion failed',
                'A landing-page enquiry could not be saved to the database.',
                [
                    'name' => $validated['name'] ?? null,
                    'phone' => $validated['phone'] ?? null,
                    'email' => $validated['email'] ?? null,
                    'bedroom_type' => $validated['bedroom_type'] ?? null,
                    'page_url' => $validated['page_url'] ?? null,
                    'ip_address' => $request->ip(),
                    'error' => $exception->getMessage(),
                    'timestamp' => now()->toDateTimeString(),
                    'environment' => app()->environment(),
                    'route' => $request->path(),
                ]
            );


            return redirect()
                ->route('landing.thank-you')
                ->with([
                    'lead_email' => $lead->email,
                    'lead_phone' => $lead->phone,
                ]);
        }


        // 2. Queue the Google Sheets sync.
        try {
            SyncLeadToGoogleSheets::dispatch(
                $lead->id,
                $request->ip(),
                $interestedIn
            )->onQueue('default');
        } catch (\Throwable $exception) {
            Log::error('Failed to queue Google Sheets lead sync.', [
                'lead_id' => $lead->id,
                'error' => $exception->getMessage(),
            ]);

            app(\App\Services\ErrorAlertService::class)->send(
                'Google Sheets sync could not be queued',
                'A lead was saved, but Laravel could not queue its Google Sheets synchronization.',
                [
                    'lead_id' => $lead->id,
                    'name' => $lead->name,
                    'phone' => $lead->phone,
                    'email' => $lead->email,
                    'bedroom_type' => $lead->bedroom_type,
                    'page_url' => $validated['page_url'] ?? null,
                    'ip_address' => $request->ip(),
                    'error' => $exception->getMessage(),
                    'timestamp' => now()->toDateTimeString(),
                    'environment' => app()->environment(),
                ]
            );


            return redirect()
                ->route('landing.thank-you')
                ->with([
                    'lead_email' => $lead->email,
                    'lead_phone' => $lead->phone,
                ]);
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
            ->route('landing.thank-you')
            ->with([
                'lead_email' => $lead->email,
                'lead_phone' => $lead->phone,
            ]);
    }
}
