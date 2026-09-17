<?php
// Temporary diagnostic script for server health check
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Content-Type: text/html; charset=utf-8');

echo "<!DOCTYPE html><html><head><title>System Diagnostic</title><style>body{font-family:sans-serif;background:#0d1117;color:#c9d1d9;padding:25px;}pre{background:#161b22;padding:15px;border-radius:6px;overflow-x:auto;color:#58a6ff;}h2{color:#58a6ff;border-bottom:1px solid #30363d;padding-bottom:8px;}.ok{color:#3fb950;font-weight:bold;}.err{color:#f85149;font-weight:bold;}.warn{color:#d29922;font-weight:bold;}</style></head><body>";
echo "<h2>ECX Platform Server Diagnostics</h2>";
echo "<strong>PHP Version:</strong> " . PHP_VERSION . "<br>";
echo "<strong>Server Software:</strong> " . htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'N/A') . "<br>";
echo "<strong>Current Directory:</strong> " . __DIR__ . "<br><br>";

// 1. Check .env
echo "<h3>1. Environment Configuration (.env)</h3>";
$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    echo "Status: <span class='ok'>EXISTS</span><br>";
    $envContent = file_get_contents($envPath);

    preg_match('/^APP_ENV=(.*)$/m', $envContent, $mEnv);
    preg_match('/^APP_DEBUG=(.*)$/m', $envContent, $mDebug);
    preg_match('/^APP_KEY=(.*)$/m', $envContent, $mKey);
    preg_match('/^DB_HOST=(.*)$/m', $envContent, $mHost);
    preg_match('/^DB_PORT=(.*)$/m', $envContent, $mPort);
    preg_match('/^DB_DATABASE=(.*)$/m', $envContent, $mDb);
    preg_match('/^DB_USERNAME=(.*)$/m', $envContent, $mUser);

    echo "APP_ENV: " . htmlspecialchars(trim($mEnv[1] ?? 'N/A')) . "<br>";
    echo "APP_DEBUG: " . htmlspecialchars(trim($mDebug[1] ?? 'N/A')) . "<br>";
    $keyVal = trim($mKey[1] ?? '');
    echo "APP_KEY: " . (!empty($keyVal) ? "<span class='ok'>Configured (" . strlen($keyVal) . " chars)</span>" : "<span class='err'>MISSING / EMPTY! (Run php artisan key:generate)</span>") . "<br>";
    echo "DB_HOST: " . htmlspecialchars(trim($mHost[1] ?? 'N/A')) . "<br>";
    echo "DB_PORT: " . htmlspecialchars(trim($mPort[1] ?? 'N/A')) . "<br>";
    echo "DB_DATABASE: " . htmlspecialchars(trim($mDb[1] ?? 'N/A')) . "<br>";
    echo "DB_USERNAME: " . htmlspecialchars(trim($mUser[1] ?? 'N/A')) . "<br>";
} else {
    echo "Status: <span class='err'>.env FILE DOES NOT EXIST IN " . __DIR__ . "!</span><br>";
    echo "<em>Please copy .env.example or create .env in this directory.</em><br>";
}

// 2. Check Storage & Cache Permissions
echo "<h3>2. Storage & Cache Permissions</h3>";
$pathsToCheck = [
    'storage' => __DIR__ . '/storage',
    'storage/logs' => __DIR__ . '/storage/logs',
    'storage/framework' => __DIR__ . '/storage/framework',
    'storage/framework/views' => __DIR__ . '/storage/framework/views',
    'storage/framework/sessions' => __DIR__ . '/storage/framework/sessions',
    'bootstrap/cache' => __DIR__ . '/bootstrap/cache',
];

foreach ($pathsToCheck as $name => $path) {
    if (!file_exists($path)) {
        echo "$name: <span class='err'>MISSING DIRECTORY (Creating...)</span>";
        @mkdir($path, 0775, true);
        echo " -> " . (file_exists($path) ? "<span class='ok'>CREATED</span>" : "<span class='err'>FAILED TO CREATE</span>") . "<br>";
    } else {
        $writable = is_writable($path);
        echo "$name: " . ($writable ? "<span class='ok'>Writable</span>" : "<span class='err'>NOT WRITABLE! (chmod 775 needed)</span>") . "<br>";
    }
}

// 3. Test Laravel Boot & Database
echo "<h3>3. Laravel Framework Boot & Database Connectivity</h3>";
try {
    if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
        throw new Exception("vendor/autoload.php is missing! Run composer install.");
    }
    require_once __DIR__ . '/vendor/autoload.php';

    if (!file_exists(__DIR__ . '/bootstrap/app.php')) {
        throw new Exception("bootstrap/app.php is missing!");
    }
    $app = require_once __DIR__ . '/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
    echo "Framework Bootstrap: <span class='ok'>SUCCESS</span><br>";

    // Test PDO connection
    $pdo = Illuminate\Support\Facades\DB::connection()->getPdo();
    echo "Database Connection: <span class='ok'>SUCCESS (Connected to " . Illuminate\Support\Facades\DB::connection()->getDatabaseName() . ")</span><br>";

    // Check Users table
    $userCount = Illuminate\Support\Facades\DB::table('users')->count();
    echo "Users in database: <span class='ok'>$userCount users found</span><br>";

    // Check Settings
    $settings = Illuminate\Support\Facades\DB::table('settings')->first();
    echo "Settings row: " . ($settings ? "<span class='ok'>Found (Site: " . htmlspecialchars($settings->site_name ?? 'N/A') . ", Theme: " . htmlspecialchars($settings->frontend_template ?? 'default') . ")</span>" : "<span class='err'>Settings row missing!</span>") . "<br>";

    // Check WhatsApp settings
    $hasWs = Illuminate\Support\Facades\Schema::hasTable('whatsapp_settings');
    echo "whatsapp_settings table: " . ($hasWs ? "<span class='ok'>EXISTS</span>" : "<span class='err'>MISSING! (Run migrations or import database.sql)</span>") . "<br>";

} catch (\Throwable $e) {
    echo "Status: <span class='err'>FAILED</span><br>";
    echo "<strong>Error Message:</strong> <span class='err'>" . htmlspecialchars($e->getMessage()) . "</span><br>";
    echo "<strong>File:</strong> " . htmlspecialchars($e->getFile()) . " (Line " . $e->getLine() . ")<br>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

echo "</body></html>";
