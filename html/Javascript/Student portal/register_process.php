<?php

include("db.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Get form data
    $fullname = trim($_POST["fullname"]);
    $age = trim($_POST["age"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $department = $_POST["department"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users
                   WHERE username='$username'
                   OR email='$email'";

    $result = mysqli_query($conn, $checkQuery);

    if(mysqli_num_rows($result) > 0)
    {
        header("Location: register.php?error=Username or Email already exists");
        exit();
    }

    // Insert data
    $insertQuery = "INSERT INTO users
    (fullname, age, email, phone, username, password, gender, department)

    VALUES

    ('$fullname',
     '$age',
     '$email',
     '$phone',
     '$username',
     '$hashedPassword',
     '$gender',
     '$department')";

    if(mysqli_query($conn, $insertQuery))
    {
        header("Location: login.php?success=1");
        exit();
    }
    else
    {
        header("Location: register.php?error=Registration Failed");
        exit();
    }

}
else
{
    header("Location: register.php");
    exit();
}

?>