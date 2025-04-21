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

<form action="_process.php" method="post">
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