<?php

// pdo_connect.php
$host = 'localhost';
$dbname = 'agents_db';
$user = 'root';
$pass = 'sql1234';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("❌ DB Error: " . $e->getMessage());
}
?>
