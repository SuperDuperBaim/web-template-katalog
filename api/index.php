<?php

/**
 * Handle Vercel's read-only filesystem and provide early error reporting.
 */

// Enable error reporting for debugging on Vercel
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SERVER['VERCEL_URL'])) {
    $storagePath = '/tmp/storage';
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

    // Force Laravel to use /tmp for storage
    putenv("APP_STORAGE=$storagePath");
    $_ENV['APP_STORAGE'] = $storagePath;
}

require __DIR__ . '/../public/index.php';
