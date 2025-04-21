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
?>

<?php
    $tools = ["Laptop", "Wi-Fi Adapter", "VPN", "Proxy"];

    echo $tools[0]; // "Laptop"
    echo "<br>";

    // foreach loop
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