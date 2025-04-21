<?php

echo "👣 Script: " . $_SERVER['PHP_SELF'] . "<br>";
echo "📍 Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "🌐 Host: " . $_SERVER['HTTP_HOST'] . "<br>";
echo "🛰️ IP Address: " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "💻 User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "🚀 Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";


// $hello = "Hello world";
// $foo = "hello";

// echo "<br>";
// echo $$foo;

$password = "supersecret123";
$hash = password_hash($password, PASSWORD_DEFAULT);

echo $hash;

$inputPassword = "supersecret123";
if (password_verify($inputPassword, $hash)) {
    echo "<br>✅ Access granted<br>";
} else {
    echo "<br>❌ Invalid password<br>";
}


$password = "agent007";
$hash = password_hash($password, PASSWORD_DEFAULT);

echo $hash;

$input = "agent007";

if(password_verify($input, $hash)) {
    echo "<br>Access Granted<br>";
} else {
    echo "<br>Access Denied<br>";
}


?>