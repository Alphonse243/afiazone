<?php

declare(strict_types=1);

/**
 * Cache Configuration
 * 
 * Configuration for caching, sessions, and job queues
 */

return [
    /**
     * Default Cache Driver
     */
    'default' => env('CACHE_DRIVER', 'file'),

    /**
     * Cache Drivers
     */
    'drivers' => [
        'file' => [
            'driver' => 'file',
            'path' => storage_path('cache'),
        ],
        'memcached' => [
            'driver' => 'memcached',
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                ],
            ],
        ],
    ],

    /**
     * Session Configuration
     */
    'session' => [
        'driver' => env('SESSION_DRIVER', 'file'),
        'file' => [
            'path' => storage_path('sessions'),
        ],
    ],

    /**
     * Queue Configuration
     */
    'queue' => [
        'driver' => env('QUEUE_DRIVER', 'file'),
        'file' => [
            'path' => storage_path('queues'),
        ],
    ],

    /**
     * Cache TTL (Time To Live) defaults
     */
    'ttl' => [
        'user' => env('CACHE_USER_TTL', 3600),          // 1 hour
        'product' => env('CACHE_PRODUCT_TTL', 1800),    // 30 minutes
        'cart' => env('CACHE_CART_TTL', 604800),        // 7 days
        'session' => env('CACHE_SESSION_TTL', 86400),   // 24 hours
    ],
];
