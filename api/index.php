<?php

/**
 * Vercel Entry Point
 * This handles the read-only filesystem by moving storage to /tmp.
 */

if (isset($_SERVER['VERCEL_URL'])) {
    $storagePath = '/tmp/storage';
    
    // Ensure required directories exist in /tmp
    $directories = [
        $storagePath . '/framework/views',
        $storagePath . '/framework/cache',
        $storagePath . '/framework/sessions',
        $storagePath . '/logs',
    ];

    foreach ($directories as $directory) {
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }

    // Set environment variables for Laravel
    putenv("APP_STORAGE=$storagePath");
    $_ENV['APP_STORAGE'] = $storagePath;
}

require __DIR__ . '/../public/index.php';
