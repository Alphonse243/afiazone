<?php

declare(strict_types=1);

/**
 * External Services Configuration
 * 
 * Configuration for third-party services integration
 * such as payment gateways, SMS providers, email services, etc.
 */

return [
    /**
     * Payment Gateways
     */
    'payment' => [
        'stripe' => [
            'key' => env('STRIPE_SECRET_KEY', ''),
            'public_key' => env('STRIPE_PUBLIC_KEY', ''),
        ],
        'mobile_money' => [
            'orange_money' => [
                'api_url' => env('ORANGE_MONEY_API_URL', ''),
                'client_id' => env('ORANGE_MONEY_CLIENT_ID', ''),
                'client_secret' => env('ORANGE_MONEY_CLIENT_SECRET', ''),
            ],
            'mtn_momo' => [
                'api_url' => env('MTN_MOMO_API_URL', ''),
                'primary_key' => env('MTN_MOMO_PRIMARY_KEY', ''),
                'secondary_key' => env('MTN_MOMO_SECONDARY_KEY', ''),
            ],
        ],
    ],

    /**
     * SMS Services
     */
    'sms' => [
        'driver' => env('SMS_DRIVER', 'twilio'),
        'twilio' => [
            'account_sid' => env('TWILIO_ACCOUNT_SID', ''),
            'auth_token' => env('TWILIO_AUTH_TOKEN', ''),
            'from' => env('TWILIO_FROM_NUMBER', ''),
        ],
    ],

    /**
     * Email Services
     */
    'email' => [
        'driver' => env('MAIL_DRIVER', 'smtp'),
        'from' => env('MAIL_FROM_ADDRESS', 'noreply@afiazone.com'),
        'smtp' => [
            'host' => env('MAIL_HOST', 'smtp.mailtrap.io'),
            'port' => env('MAIL_PORT', 587),
            'username' => env('MAIL_USERNAME', ''),
            'password' => env('MAIL_PASSWORD', ''),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
        ],
    ],

    /**
     * File Storage
     */
    'storage' => [
        'driver' => env('STORAGE_DRIVER', 's3'),
        's3' => [
            'key' => env('AWS_ACCESS_KEY_ID', ''),
            'secret' => env('AWS_SECRET_ACCESS_KEY', ''),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'bucket' => env('AWS_BUCKET', ''),
            'url' => env('AWS_URL', ''),
        ],
        'local' => [
            'root' => env('STORAGE_ROOT', storage_path()),
            'url' => env('STORAGE_URL', '/storage'),
        ],
    ],

    /**
     * Geolocation & Map Services
     */
    'maps' => [
        'google_maps' => [
            'api_key' => env('GOOGLE_MAPS_API_KEY', ''),
        ],
        'mapbox' => [
            'token' => env('MAPBOX_TOKEN', ''),
        ],
    ],

    /**
     * Analytics & Monitoring
     */
    'monitoring' => [
        'sentry' => [
            'dsn' => env('SENTRY_DSN', ''),
            'environment' => env('SENTRY_ENVIRONMENT', env('APP_ENV', 'production')),
        ],
    ],
];
