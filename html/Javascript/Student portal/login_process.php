<?php
session_start();

include("db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Get form values
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Search for the user
    $query = "SELECT * FROM users WHERE username='$username'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if(password_verify($password, $user['password']))
        {
            // Create session variables
            $_SESSION["id"] = $user["id"];
            $_SESSION["fullname"] = $user["fullname"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["department"] = $user["department"];

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        }
        else
        {
            header("Location: login.php?error=Incorrect Password");
            exit();
        }
    }
    else
    {
        header("Location: login.php?error=Username Not Found");
        exit();
    }
}
else
{
    header("Location: login.php");
    exit();
}
?>