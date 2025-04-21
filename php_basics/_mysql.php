<?php

// $host = "localhost";
// $username = "root";
// $password = "sql1234";
// $db = "agents_db";

// $conn = mysqli_connect($host, $username, $password, $db);

// if (!$conn) {
//     die("❌ Connection failed: " . mysqli_connect_error());
// }

// echo "<br>✅ Connected to MySQL database!<br><br>";

?>


<form action="_process.php" method="POST">
    <label>Username: </label><br>
    <input type="text" name="username"><br>

    <label>email: </label><br>
    <input type="text" name="email"><br>

    <label>Password: </label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="Register Agent">
    <br>
</form>


<?php
$conn = mysqli_connect("localhost", "root", "sql1234", "agents_db");

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT username, email FROM agents";
$result = mysqli_query($conn, $sql);

$agents = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $agents[] = $row;

        echo "👤 Username: " . htmlspecialchars($row["username"]) . "<br>";
        echo "📧 Email: " . htmlspecialchars($row["email"]) . "<hr>";
    }
} else {
    echo "📭 No agents found.";
}
?>
<table border="1">
  <tr><th>Username</th><th>Email</th></tr>
  <?php foreach ($agents as $row): ?>
  <tr>
    <td><?= htmlspecialchars($row['username']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
