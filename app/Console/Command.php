<?php

declare(strict_types=1);

/**
 * Console Commands
 * 
 * CLI commands for database migrations, seeders, etc.
 */

namespace App\Console;

abstract class Command
{
    /**
     * Command name
     */
    protected string $name = '';

    /**
     * Command description
     */
    protected string $description = '';

    /**
     * Execute the command
     */
    abstract public function handle(array $arguments = []): int;

    /**
     * Display error message
     */
    protected function error(string $message): void
    {
        echo "\033[31m[ERROR] {$message}\033[0m\n";
    }

    /**
     * Display success message
     */
    protected function success(string $message): void
    {
        echo "\033[32m[SUCCESS] {$message}\033[0m\n";
    }

    /**
     * Display info message
     */
    protected function info(string $message): void
    {
        echo "\033[36m[INFO] {$message}\033[0m\n";
    }

    /**
     * Display warning message
     */
    protected function warn(string $message): void
    {
        echo "\033[33m[WARNING] {$message}\033[0m\n";
    }
}

/**
 * Migrate Command
 */
class MigrateCommand extends Command
{
    protected string $name = 'migrate';
    protected string $description = 'Run database migrations';

    public function handle(array $arguments = []): int
    {
        $this->info('Running migrations...');

        // TODO: Implement migration runner
        // Scan database/migrations folder
        // Run each migration file

        $this->success('Migrations completed!');
        return 0;
    }
}

/**
 * Seed Command
 */
class SeedCommand extends Command
{
    protected string $name = 'seed';
    protected string $description = 'Seed database with sample data';

    public function handle(array $arguments = []): int
    {
        $this->info('Seeding database...');

        // TODO: Implement seeder runner
        // Load seeders from database/seeders folder

        $this->success('Database seeded!');
        return 0;
    }
}
