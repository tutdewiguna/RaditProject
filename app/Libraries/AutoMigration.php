<?php

namespace App\Libraries;

use CodeIgniter\CLI\CLI;
use Config\Services;

class AutoMigration
{
    public function run()
    {
        // Guard: Only run in development
        if (ENVIRONMENT !== 'development') {
            return;
        }

        // Guard: Check environment variable or flag
        // We accept 'true' (string) or true (bool)
        $autoMigrate = getenv('AUTO_MIGRATE');

        // Check specifically for 'true' string or boolean true
        if ($autoMigrate !== 'true' && $autoMigrate !== true) {
            return;
        }

        if (is_cli()) {
            CLI::write('[AutoMigration] Checking for pending database migrations...', 'yellow');
        }

        try {
            $migrate = Services::migrations();

            // Run all available migrations
            // By default, it runs to the latest available migration
            $migrate->latest();

            // If we get here, it didn't throw an exception. 
            // CI4's latest() doesn't return count, but we can assume success.
            // To make it nicer, we could check history, but simply running it is safe.

            if (is_cli()) {
                CLI::write('[AutoMigration] Database is up to date.', 'green');
            } else {
                log_message('info', '[AutoMigration] Database migrations check completed.');
            }

        } catch (\Throwable $e) {
            $msg = '[AutoMigration] Failed: ' . $e->getMessage();
            if (is_cli()) {
                CLI::error($msg);
                // Exit with error code to stop 'serve' or alert user
                exit(1);
            } else {
                log_message('error', $msg);
            }
        }
    }
}
