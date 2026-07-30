<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION["username"]))
{
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

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

        <li><a href="logout.php">Logout</a></li>

    </ul>

</nav>

<!-- Dashboard -->

<div class="dashboard">

<h1>

Welcome,

<?php echo $_SESSION["fullname"]; ?>

👋

</h1>

<div class="dashboard-cards">

    <div class="dashboard-card">

        <h3>Name</h3>

        <p>

        <?php echo $_SESSION["fullname"]; ?>

        </p>

    </div>

    <div class="dashboard-card">

        <h3>Username</h3>

        <p>

        <?php echo $_SESSION["username"]; ?>

        </p>

    </div>

    <div class="dashboard-card">

        <h3>Email</h3>

        <p>

        <?php echo $_SESSION["email"]; ?>

        </p>

    </div>

    <div class="dashboard-card">

        <h3>Department</h3>

        <p>

        <?php echo $_SESSION["department"]; ?>

        </p>

    </div>

</div>

<br><br>

<div class="dashboard-card">

<h2>About Your Account</h2>

<br>

<p>

You have successfully logged in to the Student Portal.

This dashboard demonstrates PHP Session Management.

You can now securely access your profile information.

</p>

<br>

<a href="logout.php" class="btn">

Logout

</a>

</div>

</div>

</body>

</html>