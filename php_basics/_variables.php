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

