<?php
session_start();
$conn = mysqli_connect("localhost", "root", "sql1234", "agents_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username, password FROM agents WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["agent_id"] = $row["id"];
            $_SESSION["agent_name"] = $row["username"];
            header("Location: dashboard.php?welcome=true");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Invalid credentials</div>";
        }        
    } else {
        echo "❌ Email not found";
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
  <h2>Agent Login</h2>
  <form method="POST">
    <input class="form-control mb-2" type="email" name="email" placeholder="Email" value="<?= $_COOKIE["remembered_email"] ?? "" ?>">
    <input class="form-control mb-2" name="password" type="password" placeholder="Password"><br>
    <input type="checkbox" name="remember"> Remember Me<br>
    <button class="btn btn-primary" type="submit">Login</button>
  </form>
</div>


