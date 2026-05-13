<?php
$host = 'localhost';
$port = 3307;
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=suvajit_portfolio", $user, $pass,
                   [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // 1. Show what's in admin_users
    $rows = $pdo->query("SELECT id, username, password, is_active FROM admin_users")->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>admin_users table:</h3><pre>";
    print_r($rows);
    echo "</pre>";

    if (!empty($rows)) {
        $hash = $rows[0]['password'];
        echo "<h3>Hash in DB:</h3><code>" . htmlspecialchars($hash) . "</code><br><br>";
        echo "password_verify('admin123', hash) = <strong>" . (password_verify('admin123', $hash) ? 'TRUE ✅' : 'FALSE ❌') . "</strong><br>";
        echo "password_verify('admin', hash)    = <strong>" . (password_verify('admin', $hash)    ? 'TRUE ✅' : 'FALSE ❌') . "</strong><br>";
        echo "strlen(hash) = " . strlen($hash) . "<br>";
    } else {
        echo "<h3 style='color:red'>❌ No rows in admin_users!</h3>";
        echo "<p>The table is empty. Run import_db.php first.</p>";
    }

    // 2. Check if table exists
    $tables = $pdo->query("SHOW TABLES LIKE 'admin_users'")->fetchAll();
    echo "<br>Table exists: " . (!empty($tables) ? 'YES ✅' : 'NO ❌') . "<br>";

} catch (PDOException $e) {
    echo "<h2 style='color:red'>DB Error: " . htmlspecialchars($e->getMessage()) . "</h2>";
}
