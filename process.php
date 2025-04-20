<!-- process.php -->
<?php
/*

$username = $_GET["username1"];
echo "Welcome, Agent " . htmlspecialchars($username) . " 🕶️";
echo "<br><br>";

$username = $_POST["username2"];
$password = $_POST["password2"];

echo "Auth request from: " . htmlspecialchars($username);

$username = $_POST["username3"];
$email = $_POST["email"];
$password = $_POST["password3"];

echo "Registered User: " . htmlspecialchars($username);

if (isset($email) && !empty($email)) {
    echo "<br>📧 Email received: " . htmlspecialchars($email);
} else {
    echo "<br>⚠️ Please provide an email.";
}

*/
echo "<br>";

if (isset($_POST["os"])) {
    $os = $_POST["os"];
    echo "💻 You selected: " . htmlspecialchars($os);
} else {
    echo "⚠️ No OS selected!";
}


echo "<br>";
if (isset($_POST["mode"])){
    $mode = $_POST["mode"];
    echo "You selected ". htmlspecialchars($mode);
} else {
    echo "No mode selected.";
}

echo "<br>";
if (isset($_POST["skills"])) {
    $skills = $_POST["skills"];
    echo "🧠 Selected Skills:<br>";
    foreach ($skills as $skill) {
        echo "✔️ " . htmlspecialchars($skill) . "<br>";
    }
} else {
    echo "⚠️ No skills selected.";
}

echo "<br>";
if (isset($_POST["languages"])) {
    $langs = $_POST["languages"];
    echo "Selected Languages:<br>";
    foreach ($langs as $lang) {
        echo "✔️ " . htmlspecialchars($lang) . "<br>";
    }
} else {
    echo "No Languages selected.";
}

echo "<br>";
$email = $_POST["email"] ?? '';
$age = $_POST["age"] ?? '';

$cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
$validAge = filter_var($age, FILTER_VALIDATE_INT);
if (filter_var($cleanEmail, FILTER_VALIDATE_EMAIL) && $validAge !== false && $validAge >= 1 && $validAge <= 120) {
    echo "✅ Valid Email: " . $cleanEmail . "<br>";
    echo "🧠 Valid Age: " . $validAge;
} else {
    echo "❌ Invalid input detected.";
}


?>