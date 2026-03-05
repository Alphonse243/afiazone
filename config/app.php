<?php

declare(strict_types=1);

/**
 * Application Configuration
 */

return [
    /**
     * Application Name
     */
    'name' => env('APP_NAME', 'AfiaZone'),

    /**
     * Application Environment
     */
    'env' => env('APP_ENV', 'production'),

    /**
     * Application Debug Mode
     */
    'debug' => (bool) env('APP_DEBUG', false),

    /**
     * Application URL
     */
    'url' => env('APP_URL', 'http://localhost'),

    /**
     * Application Timezone
     */
    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /**
     * Application Key
     */
    'key' => env('APP_KEY', ''),

    /**
     * Cipher
     */
    'cipher' => 'AES-256-CBC',

    /**
     * Logging Configuration
     */
    'logging' => [
        'driver' => env('LOG_CHANNEL', 'stack'),
        'level' => env('LOG_LEVEL', 'debug'),
        'path' => storage_path('logs/app.log'),
    ],

    /**
     * Pagination
     */
    'pagination' => [
        'per_page' => (int) env('PAGINATION_PER_PAGE', 20),
    ],

    /**
     * CORS Configuration
     */
    'cors' => [
        'allowed_origins' => explode(',', env('CORS_ALLOWED_ORIGINS', 'http://localhost:8080')),
        'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],
        'allowed_headers' => ['*'],
        'exposed_headers' => [],
        'max_age' => 3600,
        'supports_credentials' => true,
    ],

    /**
     * Security Configuration
     */
    'security' => [
        'csrf_enabled' => (bool) env('CSRF_ENABLED', true),
        'https_redirect' => (bool) env('HTTPS_REDIRECT', false),
    ],

    /**
     * Feature Flags
     */
    'features' => [
        'wallet_enabled' => (bool) env('FEATURE_WALLET_ENABLED', true),
        'prescriptions_enabled' => (bool) env('FEATURE_PRESCRIPTIONS_ENABLED', true),
        'kyc_enabled' => (bool) env('FEATURE_KYC_ENABLED', true),
        'delivery_tracking' => (bool) env('FEATURE_DELIVERY_TRACKING', true),
    ],
];
