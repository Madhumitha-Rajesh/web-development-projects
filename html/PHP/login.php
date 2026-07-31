<?php
$error = "";

if(isset($_POST['login']))
{
    // Fixed Login Credentials
    $valid_email = "madhumitha@gmail.com";
    $valid_password = "madhu123";

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == $valid_email && $password == $valid_password)
    {
        header("Location: main.php");
        exit();
    }
    else
    {
        $error = "Invalid Email or Password!";
    }
}
?>


<html>
<head>
    <title>Student Login</title>

    <style>

        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:#dbeafe;
        }

        .container{
            width:400px;
            margin:90px auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0px 0px 15px gray;
        }

        h2{
            text-align:center;
            color:#003366;
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
        }

        input[type=submit]{
            background:#007bff;
            color:white;
            border:none;
            font-size:16px;
            cursor:pointer;
        }

        input[type=submit]:hover{
            background:#0056b3;
        }

        a{
            text-decoration:none;
            color:#007bff;
        }

        p{
            text-align:center;
        }

        .error{
            color:red;
            text-align:center;
            margin-bottom:10px;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Student Login</h2>

<?php
if($error != "")
{
    echo "<div class='error'>$error</div>";
}
?>

<form method="post">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<input type="submit" name="login" value="Login">

</form>

<p>New User?
<a href="register.php">Register</a>
</p>

</div>

</body>
</html>
