<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post">
        <label>Username: </label><br>
        <input type="text" name="username"><br>
        
        <label>Password: </label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="log in">
    </form>
    
    <hr>

    <form action="form.php" method="get">
        <label>Quantity : </label><br>
        <input type="text" name="quantity">
        <input type="submit" value="total">
    </form>


</body>
</html>

<?php
    echo "{$_POST["username"]} <br>";
    echo "{$_POST["password"]} <br>";

    $item = "pizza";
    $price = 5.99;
    $quantity = $_GET["quantity"];
    $total = $price * $quantity;
    echo "You have ordered {$quantity} x {$item}/s<br>";
    echo "Your total is : \${$total}";
?>

<!--

<form action="_process.php" method="GET">
    <h3>Send</h3>
  <input type="text" name="username1" placeholder="Enter username">
  <button type="submit">Send</button>
</form>
<br>

<form action="_process.php" method="POST">
    <h3>Login</h3>
  <input type="text" name="username2" placeholder="Enter username">
  <input type="password" name="password2" placeholder="Enter password">
  <button type="submit">Login</button>
</form>
<br>

<form action="_process.php" method="POST">
    <h3>Register</h3>
  <input type="text" name="username3" placeholder="Enter username">
  <input type="text" name="email" placeholder="Enter email">
  <input type="password" name="password3" placeholder="Enter password">
  <button type="submit">Register</button>
</form>

-->


<form action="_process.php" method="POST">
  <label><input type="radio" name="os" value="Linux"> Linux</label>
  <label><input type="radio" name="os" value="Windows"> Windows</label>
  <label><input type="radio" name="os" value="Mac"> Mac</label>
  <br>
  <button type="submit">Choose OS</button>
</form>

<form action="_process.php" method="POST">
  <label><input type="radio" name="mode" value="Dark" required> Dark Mode</label>
  <label><input type="radio" name="mode" value="White" required> White Mode</label>
  <br>
  <button type="submit">Select Mode</button>
</form>

<form action="_process.php" method="POST">
  <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
  <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
  <label><input type="checkbox" name="skills[]" value="PHP"> PHP</label>
  <br>
  <button type="submit">Submit Skills</button>
</form>

<form action="_process.php" method="POST">
  <label><input type="checkbox" name="languages[]" value="Python"> Python</label>
  <label><input type="checkbox" name="languages[]" value="JavaScript"> JavaScript</label>
  <label><input type="checkbox" name="languages[]" value="PHP"> PHP</label>
  <label><input type="checkbox" name="languages[]" value="CPP"> C++</label>
  <br>
  <button type="submit">Submit Languages</button>
</form>

