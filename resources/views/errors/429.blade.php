<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Please Try Again | Avanor</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: #f7f5f0;
            color: #252525;
        }

        .error-card {
            width: 100%;
            max-width: 540px;
            padding: 42px 30px;
            text-align: center;
            background: #fff;
            border: 1px solid #e8e3d9;
            border-radius: 12px;
        }

        .error-code {
            margin: 0 0 14px;
            color: #a58a58;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0 0 16px;
            font-size: clamp(26px, 5vw, 36px);
        }

        .message {
            margin: 0 auto 26px;
            max-width: 410px;
            color: #666;
            font-size: 16px;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 13px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
        }

        .button-primary {
            background: #a58a58;
            color: #fff;
        }

        .button-whatsapp {
            background: #168b55;
            color: #fff;
        }

        .button:hover {
            opacity: 0.9;
        }

        @media (max-width: 480px) {
            .error-card {
                padding: 32px 22px;
            }
        }
    </style>
</head>
<body>
    <main class="error-card">
        <p class="error-code">Please try again</p>

        <h1>We couldn't process your request just now.</h1>

        <p class="message">
            You've submitted requests too quickly. Please wait a few minutes
            and try again. If you need assistance, contact our team on WhatsApp.
        </p>

        <div class="actions">
            <a class="button button-primary"
               href="{{ url()->previous() }}">
                Return to the previous page
            </a>

            @php
                $whatsappNumber = preg_replace(
                    '/\D/',
                    '',
                    (string) config('services.whatsapp.number', '')
                );
            @endphp

            @if ($whatsappNumber)
                <a class="button button-whatsapp"
                   href="https://wa.me/{{ $whatsappNumber }}"
                   target="_blank"
                   rel="noopener noreferrer">
                    Contact us on WhatsApp
                </a>
            @endif
        </div>
    </main>
</body>
</html>
