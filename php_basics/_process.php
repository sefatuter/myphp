<!-- _process.php 


// $_GET, $_POST = special variables used to collect data from an HTML form
//                 data is sent to the file in the action attribute of <form>
//                 <form action="some_file.php" method="get">

// $_GET = Data is appended to the url
//         NOT SECURE
//         char limit
//         Bookmark is possible w/ values
//         GET requests can be cached
//         Better for a search page

// $_POST = Data is packaged inside the body of the HTTP request
//          MORE SECURE
//          No data limit
//          Cannot bookmark
//          GET requests are not cached
//          Better for submitting credentials

-->

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


<!-- SQL connection -->
<?php

$host = "localhost";
$username = "root";
$password = "sql1234";
$db = "agents_db";

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

echo "<br>✅ Connected to MySQL database!<br>";

$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO agents (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "<br>✅ Agent registered successfully<br>";
} else {
    echo "<br>❌ Registration failed<br>";
}

?>



