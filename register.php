<?php
session_start();
$conn = mysqli_connect("localhost", "root", "sql1234", "agents_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Invalid email format.");
    }    
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO agents (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "✅ Agent registered. <a href='login.php'>Login here</a>";
    } else {
        echo "❌ Registration failed";
    }
}

?>

<form method="POST">
    <input name="username" placeholder="Username"><br>
    <input name="email" placeholder="Email" required><br>
    <input type="password" id="pass" placeholder="Password" name="password" required><br>
    <input type="password" placeholder="Confirm Password" id="confirm" required><br>
    <span id="msg"></span><br>
    <button type="submit">Register Agent</button>
</form>

<script>
document.getElementById("confirm").addEventListener("input", function () {
    const pass = document.getElementById("pass").value;
    const confirm = this.value;
    document.getElementById("msg").innerText = (pass !== confirm) ? "❌ Passwords do not match" : "";
});
</script>