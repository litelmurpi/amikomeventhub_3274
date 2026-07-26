<?php

/**
 * Web-based Database Migrator & Seeder Script for InfinityFree / Shared Hosting.
 * 
 * Usage: Visit http://<your-domain>/run_seeder.php?key=amikom2026 in browser.
 */

// Basic Security Check
$secretKey = 'amikom2026';
if (!isset($_GET['key']) || $_GET['key'] !== $secretKey) {
    http_response_code(403);
    die('<h2 style="color:red; font-family:sans-serif; text-align:center; margin-top:50px;">403 Forbidden: Akses Ditolak. Gunakan parameter ?key=amikom2026</h2>');
}

// Bootstrap Laravel Application dynamically for standard or InfinityFree structure
define('LARAVEL_START', microtime(true));

$autoloadPath = null;
$appPath = null;

$possiblePaths = [
    ['autoload' => __DIR__ . '/../vendor/autoload.php', 'app' => __DIR__ . '/../bootstrap/app.php'],
    ['autoload' => __DIR__ . '/eventhub_app/vendor/autoload.php', 'app' => __DIR__ . '/eventhub_app/bootstrap/app.php'],
    ['autoload' => __DIR__ . '/vendor/autoload.php', 'app' => __DIR__ . '/bootstrap/app.php'],
];

foreach ($possiblePaths as $p) {
    if (file_exists($p['autoload']) && file_exists($p['app'])) {
        $autoloadPath = $p['autoload'];
        $appPath = $p['app'];
        break;
    }
}

if (!$autoloadPath) {
    die('<h2 style="color:red; font-family:sans-serif; text-align:center; margin-top:50px;">Error: Berkas vendor/autoload.php tidak ditemukan di server. Pastikan folder eventhub_app atau vendor sudah di-upload.</h2>');
}

require $autoloadPath;
$app = require_once $appPath;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Artisan;

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfinityFree Migrator & Seeder — Amikom Event Hub</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background: #0f172a; color: #f8fafc; padding: 40px; }
        .card { max-width: 650px; margin: 0 auto; background: #1e293b; border-radius: 16px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        h1 { color: #6366f1; font-size: 22px; margin-top: 0; }
        .log { background: #020617; padding: 16px; border-radius: 8px; font-family: monospace; font-size: 13px; color: #38bdf8; overflow-x: auto; white-space: pre-wrap; margin-bottom: 16px; }
        .success { color: #10b981; font-weight: bold; }
        .error { color: #f43f5e; font-weight: bold; }
        .btn { display: inline-block; background: #6366f1; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: bold; margin-top: 16px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🚀 InfinityFree Migrator & Seeder — Amikom Event Hub</h1>
        <p style="color: #94a3b8; font-size: 14px;">Menjalankan Migrasi Tabel & Seeder di server InfinityFree...</p>

        <div class="log">
<?php
try {
    // 1. Run Migrations first to ensure all new tables (organizations, etc.) exist
    echo "--- MENJALANKAN MIGRASI TABEL ---\n";
    Artisan::call('migrate', ['--force' => true]);
    echo htmlspecialchars(Artisan::output()) . "\n";

    // 2. Run Database Seeder
    echo "--- MENJALANKAN DATABASE SEEDER ---\n";
    Artisan::call('db:seed', ['--force' => true]);
    echo htmlspecialchars(Artisan::output()) . "\n";

    echo "<span class=\"success\">✓ BERHASIL! Seluruh tabel migrasi (termasuk organizations) telah dibuat & database telah di-seed dengan sukses.</span>\n";
} catch (\Throwable $e) {
    echo "<span class=\"error\">✕ GAGAL EKSEKUSI:\n" . htmlspecialchars($e->getMessage()) . "</span>\n";
}
?>
        </div>

        <a href="/" class="btn">← Kembali ke Beranda Utama</a>
    </div>
</body>
</html>
