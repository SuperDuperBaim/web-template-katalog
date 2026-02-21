<?php

/**
 * Handle Vercel's read-only filesystem by overriding the storage path.
 * This ensures that Laravel uses /tmp for caches and logs.
 */

// Override storage path to /tmp for Vercel
if (isset($_SERVER['VERCEL_URL'])) {
    if (!is_dir('/tmp/storage/framework/views')) {
        mkdir('/tmp/storage/framework/views', 0755, true);
    }
    if (!is_dir('/tmp/storage/framework/cache')) {
        mkdir('/tmp/storage/framework/cache', 0755, true);
    }
    if (!is_dir('/tmp/storage/framework/sessions')) {
        mkdir('/tmp/storage/framework/sessions', 0755, true);
    }
    if (!is_dir('/tmp/storage/logs')) {
        mkdir('/tmp/storage/logs', 0755, true);
    }
    
    // Set the storage path environment variable
    putenv('APP_STORAGE=/tmp/storage');
}

require __DIR__ . '/../public/index.php';
