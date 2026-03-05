<?php

declare(strict_types=1);

/**
 * Bootstrap file for tests
 */

// Set up environment
$_ENV['APP_ENV'] = 'testing';
$_ENV['APP_DEBUG'] = 'true';

// Load environment variables
require_once __DIR__ . '/../vendor/autoload.php';

// Load helper functions
require_once __DIR__ . '/../app/helpers.php';

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
