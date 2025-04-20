<?php

    $name = "sefa";
    $age = 21;
    $users = 2;

    $online = true;
    $employd = false;

    echo "hello {$name} <br>";
    echo "Hey ";
    echo "Hey <br>";

    echo "{$age} <br>";
    echo "There are {$users} user online <br>";

    echo "user online : {$online} <br>";
    echo "user employed : {$employd} <br>";

    $total = $age * $users;

    echo "total: \${$total} <br><br>";
?>

<?php

    $name = "Jake";            // string
    $age = 29;                 // integer
    $height = 5.9;             // float
    $is_hacker = true;         // boolean
    $skills = ["PHP", "SQL"];  // array

    echo "Agent: $name 🕵️‍♂️, Age: $age, Skills: " . implode(", ", $skills) . "<br><br>";

    $name = "sefa";
    $num = 3;
    $is_like = true;
    $hobby = ["pr","og","ram","ming"];

    echo "Name: $name <br> Number: $num <br> PHP: $is_like <br> Hobby: " . join(", ", $hobby) . "<br><br>";
?>

<?php
$a = 1;
$b = 4;

echo "Addition: " . ($a + $b) . "<br>";
echo "Subtraction: " . ($a - $b) . "<br>";
echo "Multiplication: " . ($a * $b) . "<br>";
echo "Division: " . ($a / $b) . "<br>";
echo "Modulus: " . ($a % $b) . "<br>";
echo "Exponent: " . ($a ** $b) . "<br>";
echo "<br>"
?>

<!-- index.html -->
<form action="process.php" method="GET">
    <h3>Send</h3>
  <input type="text" name="username1" placeholder="Enter username">
  <button type="submit">Send</button>
</form>
<br>
<!-- index.html -->
<form action="process.php" method="POST">
    <h3>Login</h3>
  <input type="text" name="username2" placeholder="Enter username">
  <input type="password" name="password2" placeholder="Enter password">
  <button type="submit">Login</button>
</form>
<br>

<form action="process.php" method="POST">
    <h3>Register</h3>
  <input type="text" name="username3" placeholder="Enter username">
  <input type="text" name="email" placeholder="Enter email">
  <input type="password" name="password3" placeholder="Enter password">
  <button type="submit">Register</button>
</form>

<?php
/*
$age = 22;
$has_ID = true;

if ($age >= 18 && $has_ID) {
    echo "✅ Access allowed<br>";
} else {
    echo "❌ Access denied<br>";
}

$logged_in = true;
$is_admin = false;

if ($logged_in || $is_admin) {
    echo "Welcome to the dashboard<br>";
}

if (!$logged_in) {
    echo "Please login first<br>";
}
*/
?>


<?php
/*
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start coding week 🧠<br><br>";
        break;
    case "Friday":
        echo "Deploy the payload 🚀<br><br>";
        break;
    case "Sunday":
        echo "Sleep mode initiated 😴<br><br>";
        break;
    default:
        echo "Just another ops day ⚙️<br><br>";
}
?>

<?php
for ($i = 1; $i <= 5; $i++) {
    echo "Line $i <br>";
}


for ($x = 5; $x >= 1; $x--) {
    echo "T-minus $x <br>";
}
echo "💥 Launch!<br><br>";

$x = 1;
while ($x <= 5) {
    echo "line $x <br>";
    $x++;
}

echo "<br>";
$num = 10;

while ($num >= 1){
    if ($num % 2 != 0){
        $num--;
        continue;
    }
    echo "Even Number: $num<br>";
    $num--;
}
*/

?>

<?php
    $tools = ["Laptop", "Wi-Fi Adapter", "VPN", "Proxy"];

    echo $tools[0]; // "Laptop"
    echo "<br>";

    foreach ($tools as $tool) {
        echo "Equipped: $tool <br>";
    }
    
    echo "<br>";

    $hack_tools = ["Nmap", "Wireshark", "Burp Suite"];
    array_push($hack_tools, "Metasploit");

    foreach ($hack_tools as $tool) {
        echo "Loaded tool: $tool <br>";
    }
    echo "<br>";

    array_pop($hack_tools);
    foreach ($hack_tools as $tool) {
        echo "Loaded tool: $tool <br>";
    }
?>

<?php
    // Associative Array - dictionary
    $user = [
        "username" => "sefa",
        "email" => "sefa@test.com",
        "rank" => "first tier"
    ];
    echo "<br>";
    echo "Test : {$user["username"]}";
    echo "<br>";
    echo "<br>";

    
    foreach ($user as $key => $value) {
        echo "$key: $value <br>";
    }
    echo "<br><br>";

    $users = [
        "john" => "admin",
        "jane" => "editor",
        "jack" => "subscriber"
    ];
    
    echo "Jane's role: " . $users["jane"];

    $all = array_keys($users);
    echo "<br>";
    print_r($all);
    echo "<br>";
    echo $all[0];
    echo "<br>";

    $name = "Sefa";

    if (isset($name)) {
        echo "✅ Variable exists and is not null.";
    }
    echo "<br>";

    $email = "";

    if (empty($email)) {
        echo "⚠️ Email is empty.";
    }

    echo "<br><br>";
?>

<form action="process.php" method="POST">
  <label><input type="radio" name="os" value="Linux"> Linux</label>
  <label><input type="radio" name="os" value="Windows"> Windows</label>
  <label><input type="radio" name="os" value="Mac"> Mac</label>
  <br>
  <button type="submit">Choose OS</button>
</form>

<form action="process.php" method="POST">
  <label><input type="radio" name="mode" value="Dark" required> Dark Mode</label>
  <label><input type="radio" name="mode" value="White" required> White Mode</label>
  <br>
  <button type="submit">Select Mode</button>
</form>

<form action="process.php" method="POST">
  <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
  <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
  <label><input type="checkbox" name="skills[]" value="PHP"> PHP</label>
  <br>
  <button type="submit">Submit Skills</button>
</form>

<form action="process.php" method="POST">
  <label><input type="checkbox" name="languages[]" value="Python"> Python</label>
  <label><input type="checkbox" name="languages[]" value="JavaScript"> JavaScript</label>
  <label><input type="checkbox" name="languages[]" value="PHP"> PHP</label>
  <label><input type="checkbox" name="languages[]" value="CPP"> C++</label>
  <br>
  <button type="submit">Submit Languages</button>
</form>

<?php

function greetAgent($name) {
    echo "Hello, $name <br>";
}
greetAgent("Sefa");

function sum($a, $b) {
    return $a + $b;
}
$total = sum(10, 5); // 15
echo "Total: $total";

echo "<br>";
function deployPayload($target = "unknown") {
    echo "🚀 Deploying to $target...<br>";
}

deployPayload();         // "unknown"
deployPayload("Server1"); // "Server1"

echo "<br>";
function calculateArea($width, $height){
    return $width * $height;
}
$area = calculateArea(5,6);
echo $area;

echo "<br>";
$agent = "  sefa the legend  ";

echo "Length: " . strlen($agent) . "<br>";
echo "Upper: " . strtoupper($agent) . "<br>";
echo "Capitalized: " . ucwords(trim($agent)) . "<br>";
echo "Replace: " . str_replace("legend", "coder", $agent) . "<br>";
echo "Reverse: " . strrev($agent) . "<br>";

echo "<br>";
$sentence = "learning php is powerful";
echo "length: " . strlen($sentence) . "<br>";
echo "uppercase: " . strtoupper($sentence) . "<br>";
echo "capitalize: ". ucwords($sentence) . "<br>";
echo "replace: " . str_replace("php", "python", $sentence) . "<br>";
echo "reverse: " . strrev($sentence) . "<br>"; 
echo "<br>";
?>

<form action="process.php" method="post">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="age" placeholder="Age">
    <button type="submit">go</button>
</form>

<br>

<?php

setcookie("agent", "sefa", time() + 600);


if (isset($_COOKIE["agent"])) {
    echo "Welcome back, " . htmlspecialchars($_COOKIE["agent"]);
} else {
    echo "Welcome new agent. Cookie has been set. Refresh the page.";
    setcookie("agent", "sefa", time() + 600);
}

setcookie("theme", "dark", time() + 86400);

?>

<html>
<body>
    <br>
        <?php
        if (isset($_COOKIE["theme"])) {
            echo "🌙 Theme is set to: " . htmlspecialchars($_COOKIE["theme"]);
        } else {
            echo "No theme selected yet.";
        }
        ?> 
    <br>
</body>
</html>


<?php
    session_start();
    echo "<br>";

    if (isset($_SESSION["username"])) {
        echo "👋 Welcome back, " . htmlspecialchars($_SESSION["username"]);
    } else {
        $_SESSION["username"] = "sefa";
        echo "🆕 Session started. Refresh to continue as: " . $_SESSION["username"];
    }


// Feature  	Cookie	              Session
// Stored in	Browser	              Server
// Visible	    Yes	                  No
// Secure	    ❌ (can be tampered)	✅ (server managed)
// Size limit	~4KB	              Large
// Use case	    Light prefs           Auth, cart, internal data

echo "<br>";

    $_SESSION["agent_level"] = "elite";

    // Handle session clear
    if (isset($_POST["clear"])) {
        session_unset();
        session_destroy();
        echo "🧹 Session cleared. Reload to reset.";
        exit;
    }

    if (isset($_SESSION["agent_level"])) {
        echo "Welcome, " . htmlspecialchars($_SESSION["agent_level"]);
    } else {
        echo "No session active.";
    }
?>
<br>
<!-- Clear button form -->
<form method="POST">
    <button type="submit" name="clear">Clear Session</button>
</form>

<?php



?>