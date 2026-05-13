<?php
// One-time database import script — delete this file after use!
$host = 'localhost';
$user = 'root';
$pass = '';
$port = 3307;
$sql  = file_get_contents(__DIR__ . '/portfolio.sql');

try {
    $pdo = new PDO("mysql:host=$host;port=$port", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `suvajit_portfolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `suvajit_portfolio`");

    $statements = array_filter(array_map('trim', explode(';', $sql)));
    $ok = 0; $errors = [];
    foreach ($statements as $stmt) {
        if (empty($stmt) || preg_match('/^--/', $stmt)) continue;
        try { $pdo->exec($stmt); $ok++; } catch (PDOException $e) { $errors[] = $e->getMessage(); }
    }

    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Import</title>";
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'/></head>";
    echo "<body class='p-4'>";
    echo "<div class='alert alert-success'><h4>✅ Import complete! ($ok statements executed)</h4></div>";
    if ($errors) {
        echo "<div class='alert alert-warning'><strong>Warnings (non-fatal):</strong><ul>";
        foreach ($errors as $e) echo "<li><small>$e</small></li>";
        echo "</ul></div>";
    }
    echo "<div class='card p-4 mb-3' style='max-width:500px'>";
    echo "<h5>🔐 Admin Login Credentials</h5>";
    echo "<table class='table table-bordered'>";
    echo "<tr><th>URL</th><td><a href='admin/login'>http://localhost/suvajit-portfolio-ci3/admin/login</a></td></tr>";
    echo "<tr><th>Username</th><td><code>admin</code></td></tr>";
    echo "<tr><th>Password</th><td><code>admin123</code></td></tr>";
    echo "</table>";
    echo "<p class='text-danger mb-0'><strong>⚠ Change your password after first login!</strong></p>";
    echo "</div>";
    echo "<a href='admin/login' class='btn btn-primary me-2'>→ Go to Admin Panel</a>";
    echo "<a href='/' class='btn btn-outline-secondary'>→ View Portfolio</a>";
    echo "<hr/><p class='text-muted small'>Delete this file after use: <code>import_db.php</code></p>";
    echo "</body></html>";

} catch (PDOException $e) {
    echo "<h2 style='color:red'>❌ Connection failed: " . $e->getMessage() . "</h2>";
}
