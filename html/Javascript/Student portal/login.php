<?php
session_start();

if(isset($_SESSION['username']))
{
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Login</title>

<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<!-- Navigation -->

<nav class="navbar">

    <div class="logo">
        Student Portal
    </div>

    <ul class="nav-links">

        <li><a href="index.php">Home</a></li>

        <li><a href="register.php">Register</a></li>

    </ul>

</nav>

<!-- Login Form -->

<div class="form-container">

<div class="form-box">

<h2>Student Login</h2>

<?php

if(isset($_GET['success']))
{
    echo "<p class='success'>Registration Successful! Please Login.</p>";
}

if(isset($_GET['error']))
{
    echo "<p class='error'>".$_GET['error']."</p>";
}

?>

<form action="login_process.php" method="POST">

<div class="form-group">

<label>Username</label>

<input
type="text"
name="username"
placeholder="Enter Username"
required>

</div>

<div class="form-group">

<label>Password</label>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

</div>

<button type="submit">

Login

</button>

</form>

<br>

<p style="text-align:center;">

Don't have an account?

<a href="register.php">

Register Here

</a>

</p>

</div>

</div>

</body>
</html>