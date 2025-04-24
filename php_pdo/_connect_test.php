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
        echo "👤 " . htmlspecialchars($agent['username']) . "<br>";
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

    echo "🗑️ Agent deleted<br>";

} catch (PDOException $e) {
    die("❌ Delete failed: " . $e->getMessage());
}
echo "<hr>fetch<br>";
// fetch() vs fetchAll() — Know the Difference
// Method	Purpose	Use Case
// fetch()	Get 1 row at a time	When expecting a single result
// fetchAll()	Get all rows in an array	For listing multiple results

// Fetch
$stmt = $conn->prepare("SELECT * FROM agents WHERE id = :id");
$stmt->execute([':id' => 41]);

$agent = $stmt->fetch(PDO::FETCH_ASSOC);

if ($agent) {
    echo "👤 " . htmlspecialchars($agent["username"]) . "<br>";
    echo "📧 " . htmlspecialchars($agent["email"]);
} else {
    echo "❌ Agent not found.";
}
echo "<hr>fetchAll<br>";
// FetchAll
$stmt = $conn->query("SELECT username, email FROM agents");
$agents = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($agents as $agent) {
    echo "👤 " . htmlspecialchars($agent["username"]) . "<br>";
}
echo "<hr>fetchObject<br>";
// FetchObject
$stmt = $conn->query("SELECT * FROM agents");
while ($agent = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "👤 {$agent->username} — 📧 {$agent->email}<br>";
}

?>

<?php
//Challenge
echo "<br>Challenge<br>";
$stmt = $conn->prepare("SELECT username, email FROM agents WHERE id = :id");
$stmt->execute([':id' => 13]);

while($ids_names = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "👤 " . htmlspecialchars($ids_names->username) . "<br>";
    echo "📧 " . htmlspecialchars($ids_names->email);
}

?>

<?php
echo "<hr>";
// 1. bindParam() — binds by reference

$email = "asdq@gmail.com";
$stmt = $conn->prepare("SELECT * FROM agents WHERE email = :email");
$stmt->bindParam(":email", $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);
echo $result->username . "<br>";


// 2. bindValue() — binds by value (frozen at time of binding)

$stmt = $conn->prepare("SELECT * FROM agents WHERE id = :id");
$stmt->bindValue(":id", 41);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);
echo $result->username . "<br>";


// 3. execute(array) — preferred shorthand
// $stmt = $conn->prepare("INSERT INTO agents (username, email, password) VALUES (:u, :e, :p)");
// $stmt->execute([
//     ':u' => 'cyberwolf',
//     ':e' => 'cyber@agency.com',
//     ':p' => password_hash("securepass", PASSWORD_DEFAULT)
// ]);
// $result = $stmt->fetch(PDO::FETCH_OBJ);
// echo $result->username . "<br>";

?>

<?php



?>