<?php

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

?>

<?php

    $age = 101;

    if ($age >= 100) {
        echo "more than 100";
    } elseif ($age == 100){
        echo "100";
    } else {
        echo "less than 100";
    }

?>

<?php

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