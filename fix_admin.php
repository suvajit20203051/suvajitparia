<?php
$host = 'localhost';
$port = 3307;
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=suvajit_portfolio", $user, $pass,
                   [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Step 1: Make sure column is wide enough for bcrypt (60 chars) — use 255 to be safe
    $pdo->exec("ALTER TABLE admin_users MODIFY COLUMN password VARCHAR(255) NOT NULL");
    echo "✅ Column resized to VARCHAR(255)<br>";

    // Step 2: Drop and re-insert admin row cleanly
    $pdo->exec("DELETE FROM admin_users WHERE username='admin'");
    $hash = password_hash('admin123', PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, is_active) VALUES ('admin', ?, 1)");
    $stmt->execute([$hash]);
    echo "✅ Admin user inserted<br>";

    // Step 3: Read back and verify
    $row    = $pdo->query("SELECT password FROM admin_users WHERE username='admin'")->fetch(PDO::FETCH_ASSOC);
    $stored = $row['password'];
    $ok     = password_verify('admin123', $stored);

    echo "✅ Hash stored: <code>" . htmlspecialchars($stored) . "</code><br>";
    echo "✅ Hash length: " . strlen($stored) . " chars<br>";
    echo "✅ password_verify result: <strong>" . ($ok ? 'TRUE ✅' : 'FALSE ❌') . "</strong><br><br>";

    if ($ok) {
        echo "<div style='background:#d4edda;padding:16px;border-radius:8px;margin-top:12px'>";
        echo "<h4>🎉 All good! Login with:</h4>";
        echo "<p><strong>Username:</strong> admin</p>";
        echo "<p><strong>Password:</strong> admin123</p>";
        echo "<a href='admin/login' style='background:#6c63ff;color:#fff;padding:10px 20px;border-radius:6px;text-decoration:none'>→ Go to Admin Login</a>";
        echo "</div>";
    } else {
        echo "<div style='background:#f8d7da;padding:16px;border-radius:8px'>";
        echo "<h4>❌ Verification still failing. PHP version issue?</h4>";
        echo "PHP version: " . PHP_VERSION . "<br>";
        echo "PASSWORD_DEFAULT algo: " . PASSWORD_DEFAULT . "<br>";
        echo "</div>";
    }

    echo "<hr><p style='color:#888;font-size:.8rem'>Delete fix_admin.php and debug_login.php after use.</p>";

} catch (PDOException $e) {
    echo "<h2 style='color:red'>DB Error: " . htmlspecialchars($e->getMessage()) . "</h2>";
}
