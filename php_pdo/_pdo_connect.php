<?php
# . = ->

// _pdo_connect.php
$host = "localhost";
$dbname = "agents_db";
$username = "root";
$password = "sql1234";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✅ Connected with PDO<br>";
} catch (PDOException $e) {
    die("❌ PDO Connection failed: " . $e->getMessage());
}
?>
