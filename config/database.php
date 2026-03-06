<?php

declare(strict_types=1);

/**
 * Database Configuration
 */

return [
    /**
     * Default Database Connection
     */
    'default' => env('DB_CONNECTION', 'mysql'),

    /**
     * Database Connections
     */
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => (int) env('DB_PORT', 3306),
            'database' => env('DB_NAME', 'afiazone'),
            'username' => env('DB_USER', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => 'InnoDB',
            'options' => [
                \PDO::ATTR_TIMEOUT => 30,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
            ],
        ],
    ],

    /**
     * Migration Settings
     */
    'migrations' => [
        'table' => 'migrations',
        'directory' => database_path('migrations'),
    ],

    /**
     * Query Logging
     */
    'query_log' => env('DB_QUERY_LOG', false),
];
