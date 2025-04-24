<?php
require_once "_pdo_connect.php";

// echo "🚀 Database connected via PDO";
$username = "agent_sefa";
$email = "sefa@agency.com";
$password = password_hash("secure007", PASSWORD_DEFAULT);

// INSERT
try {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM agents WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "⚠️ Email already registered.";
    } else {
        // Insert new agent
        $stmt = $conn->prepare("INSERT INTO agents (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        echo "✅ New agent inserted";
    }
} catch (PDOException $e) {
    die("❌ Insert failed: " . $e->getMessage());
}

// SELECT
try {
    $stmt = $conn->query("SELECT id, username, email FROM agents");
    $agents = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<br><br>";
    foreach ($agents as $agent) {
        echo "🆔 " . $agent['id'] . "<br>";
        echo "👤 " . $agent['username'] . "<br>";
        echo "📧 " . $agent['email'] . "<hr>";
    }

} catch (PDOException $e) {
    die("❌ Select failed: " . $e->getMessage());
}

// UPDATE

try {
    $id = 1;
    $newEmail = "ali@gmail.cm";

    $stmt = $conn->prepare("UPDATE agents SET email = ? WHERE id = ?");
    $stmt->execute([$newEmail, $id]);


} catch (PDOException $e) {
    die("❌ Update failed: " . $e->getMessage());
}

// DELETE

try {
    $id = 1;

    $stmt = $conn->prepare("DELETE FROM agents WHERE id = ?");
    $stmt->execute([$id]);

    echo "<br>🗑️ Agent deleted";

} catch (PDOException $e) {
    die("❌ Delete failed: " . $e->getMessage());
}

?>

