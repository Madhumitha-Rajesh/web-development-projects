<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2 id="title">Student Registration Form</h2>

    <form action="" method="post">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone Number</label>
        <input type="text" name="phone" required>

        <label>Age</label>
        <input type="number" name="age" min="18" max="60" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <input type="submit" name="submit" value="Register">

    </form>

    <?php

    if(isset($_POST['submit']))
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $age = trim($_POST['age']);
        $password = trim($_POST['password']);
        $confirm = trim($_POST['confirm_password']);

        echo "<div class='result'>";

        // Required Field Validation
        if(empty($name) || empty($email) || empty($phone) || empty($age) || empty($password) || empty($confirm))
        {
            echo "<h3 class='error'>All fields are required.</h3>";
        }

        // Name Validation (Regular Expression)
        elseif(!preg_match("/^[A-Za-z ]+$/", $name))
        {
            echo "<p class='error'>Invalid Name. Only alphabets and spaces are allowed.</p>";
        }

        // Email Validation
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "<p class='error'>Invalid Email Address.</p>";
        }

        // Phone Validation (Regular Expression)
        elseif(!preg_match("/^[0-9]{10}$/", $phone))
        {
            echo "<p class='error'>Phone number must contain exactly 10 digits.</p>";
        }

        // Range Validation
        elseif($age < 18 || $age > 60)
        {
            echo "<p class='error'>Age must be between 18 and 60.</p>";
        }

        // Password Validation (Regular Expression)
        elseif(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/", $password))
        {
            echo "<p class='error'>
            Password must contain at least:
            <br>• 8 characters
            <br>• One uppercase letter
            <br>• One lowercase letter
            <br>• One number
            </p>";
        }

        // Compare Validation
        elseif($password != $confirm)
        {
            echo "<p class='error'>Passwords do not match.</p>";
        }

        else
        {
            echo "<script>alert('Successfully saved your Information');</script>";

            echo "<h3 class='success'>Registration Successful!</h3>";

            echo "<b>Name :</b> " . htmlspecialchars($name) . "<br><br>";

            echo "<b>Email :</b> " . htmlspecialchars($email) . "<br><br>";

            echo "<b>Phone :</b> " . htmlspecialchars($phone) . "<br><br>";

            echo "<b>Age :</b> " . htmlspecialchars($age);
        }

        echo "</div>";
    }

    ?>

</div>

</body>
</html>