#!/usr/bin/env php
<?php

/**
 * Setup Script for Laragon
 *
 * Installs dependencies and initializes the project
 */

declare(strict_types=1);

// Colors for output
class Colors {
    const RESET = "\033[0m";
    const GREEN = "\033[92m";
    const BLUE = "\033[94m";
    const YELLOW = "\033[93m";
    const RED = "\033[91m";
}

// Set base path
define('BASE_PATH', dirname(__DIR__));

echo Colors::BLUE . "\n";
echo "╔════════════════════════════════════╗\n";
echo "║  🏥 AfiaZone Setup (Laragon)       ║\n";
echo "╚════════════════════════════════════╝\n";
echo Colors::RESET . "\n";

// Check if composer.json exists
if (!file_exists(BASE_PATH . '/composer.json')) {
    echo Colors::RED . "❌ composer.json not found\n" . Colors::RESET;
    exit(1);
}

// Step 1: Install composer dependencies
echo Colors::BLUE . "Step 1: Installing PHP dependencies..." . Colors::RESET . "\n";
$composerOutput = shell_exec('cd ' . BASE_PATH . ' && composer install 2>&1');
if (strpos($composerOutput, 'successfully') === false && strpos($composerOutput, 'updated') === false) {
    // Still check if vendor exists (composer might have succeeded)
    if (!is_dir(BASE_PATH . '/vendor')) {
        echo Colors::RED . "❌ Composer installation failed\n" . Colors::RESET;
        echo $composerOutput;
        exit(1);
    }
}
echo Colors::GREEN . "✓ PHP dependencies installed\n" . Colors::RESET . "\n";

// Step 2: Create uploads directory
echo Colors::BLUE . "Step 2: Creating upload directories..." . Colors::RESET . "\n";
$uploadDirs = [
    'public/uploads',
    'public/uploads/products',
    'public/uploads/prescriptions',
    'public/uploads/kyc',
    'storage/logs',
    'storage/cache',
];

foreach ($uploadDirs as $dir) {
    $dirPath = BASE_PATH . '/' . $dir;
    if (!is_dir($dirPath)) {
        mkdir($dirPath, 0755, true);
    }
}
echo Colors::GREEN . "✓ Upload directories created\n" . Colors::RESET . "\n";

// Step 3: Setup database
echo Colors::BLUE . "Step 3: Setting up database..." . Colors::RESET . "\n";

// Load .env to get database credentials
$envFile = BASE_PATH . '/.env';
if (!file_exists($envFile)) {
    echo Colors::RED . "❌ .env file not found. Please create it from .env.example\n" . Colors::RESET;
    exit(1);
}

$env = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$envVars = [];
foreach ($env as $line) {
    if (strpos($line, '#') === 0 || strpos($line, '=') === false) {
        continue;
    }
    [$key, $value] = explode('=', $line, 2);
    $envVars[trim($key)] = trim($value);
}

$dbHost = $envVars['DB_HOST'] ?? 'localhost';
$dbPort = $envVars['DB_PORT'] ?? 3306;
$dbName = $envVars['DB_NAME'] ?? 'afiazone';
$dbUser = $envVars['DB_USER'] ?? 'root';
$dbPassword = $envVars['DB_PASSWORD'] ?? '';

try {
    // Connect to MySQL (without specifying database)
    $dsn = "mysql:host={$dbHost};port={$dbPort}";
    $pdo = new PDO($dsn, $dbUser, $dbPassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // Drop and recreate database
    $pdo->exec("DROP DATABASE IF EXISTS `{$dbName}`");
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    // Connect to the new database
    $dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName}";
    $pdo = new PDO($dsn, $dbUser, $dbPassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // Load and execute schema
    $schemaFile = BASE_PATH . '/database/schema.sql';
    $schema = file_get_contents($schemaFile);

    // Split and execute queries
    $queries = array_filter(array_map('trim', explode(';', $schema)));
    foreach ($queries as $query) {
        if (!empty($query)) {
            $pdo->exec($query);
        }
    }

    echo Colors::GREEN . "✓ Database setup completed\n" . Colors::RESET;
    echo Colors::YELLOW . "  Database: {$dbName} at {$dbHost}:{$dbPort}\n" . Colors::RESET . "\n";

} catch (PDOException $e) {
    echo Colors::RED . "❌ Database Error: " . $e->getMessage() . "\n" . Colors::RESET;
    exit(1);
}

// Step 4: Generate APP_KEY if not set
echo Colors::BLUE . "Step 4: Generating APP_KEY..." . Colors::RESET . "\n";
if (empty($envVars['APP_KEY']) || strpos($envVars['APP_KEY'], 'base64:') === false) {
    $key = base64_encode(random_bytes(32));
    file_put_contents($envFile, str_replace(
        'APP_KEY=base64:IlZhbHVlIG11c3QgYmUgYSB2YWxpZCBCYXNlNjQgc3RyaW5nLiI=',
        "APP_KEY=base64:{$key}",
        file_get_contents($envFile)
    ));
    echo Colors::GREEN . "✓ APP_KEY generated\n" . Colors::RESET . "\n";
} else {
    echo Colors::GREEN . "✓ APP_KEY already set\n" . Colors::RESET . "\n";
}

// Final summary
echo Colors::GREEN . "\n╔════════════════════════════════════╗\n" . Colors::RESET;
echo Colors::GREEN . "║  ✅ Setup Completed Successfully!  ║\n" . Colors::RESET;
echo Colors::GREEN . "╚════════════════════════════════════╝\n\n" . Colors::RESET;

echo Colors::YELLOW . "Next steps:\n" . Colors::RESET;
echo "1. Add this to your Laragon hosts (C:\\laragon\\etc\\hosts):\n";
echo "   127.0.0.1 afiazone.test\n\n";

echo "2. Create a virtual host in Laragon:\n";
echo "   - Copy C:\\laragon\\etc\\nginx\\conf.d\\vhosts.conf.example to vhosts.conf\n";
echo "   - Add:\n";
echo "     server {\n";
echo "         listen 8888;\n";
echo "         server_name afiazone.test;\n";
echo "         root \"C:/laragon/www/afiazone/public\";\n";
echo "         index index.php index.html;\n";
echo "         location / {\n";
echo "             try_files \$uri \$uri/ /index.php?\$query_string;\n";
echo "         }\n";
echo "         location ~ \\.php\$ {\n";
echo "             fastcgi_pass 127.0.0.1:9000;\n";
echo "             fastcgi_index index.php;\n";
echo "             include fastcgi_params;\n";
echo "             fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;\n";
echo "         }\n";
echo "     }\n\n";

echo "3. Restart Laragon and access:\n";
echo Colors::BLUE . "   http://afiazone.test:8888\n" . Colors::RESET . "\n";

echo "Happy coding! 🚀\n";
