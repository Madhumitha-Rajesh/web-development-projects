<?php

$message = "";

if(isset($_POST['register']))
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];



    // Regular Expression Validation

    if(!preg_match("/^[A-Za-z ]+$/", $name))
    {
        $message = "Name should contain only letters!";
    }


    // Range Validation

    else if($age < 17 || $age > 30)
    {
        $message = "Age must be between 17 and 30!";
    }


    // Phone Number Regex Validation

    else if(!preg_match("/^[0-9]{10}$/", $phone))
    {
        $message = "Enter a valid 10 digit phone number!";
    }


    // Compare Field Validation

    else if($password != $confirm_password)
    {
        $message = "Passwords do not match!";
    }


    else
    {
        $message = "Registration Successful!";
    }

}

?>


<!DOCTYPE html>
<html>

<head>

<title>Student Registration</title>


<style>

body{

    margin:0;
    font-family:Arial,sans-serif;
    background:#dbeafe;

}


.container{

    width:400px;
    margin:50px auto;

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

    margin:8px 0;

    border:1px solid #ccc;

    border-radius:5px;

}



input[type=submit]

{

    background:#28a745;

    color:white;

    border:none;

    font-size:16px;

    cursor:pointer;

}


input[type=submit]:hover

{

    background:#218838;

}


.message{

    text-align:center;

    color:red;

    margin-bottom:10px;

}


a{

    color:#007bff;

    text-decoration:none;

}


p{

    text-align:center;

}


</style>


</head>



<body>


<div class="container">


<h2>
Student Registration
</h2>


<?php

if($message!="")
{
    echo "<div class='message'>$message</div>";
}

?>



<form method="post">


<!-- Required Field Validation -->

<input type="text" 
name="name" 
placeholder="Enter Name"
required>



<input type="email" 
name="email" 
placeholder="Enter Email"
required>



<!-- Range Validation -->

<input type="number" 
name="age" 
placeholder="Enter Age"
min="17"
max="30"
required>



<!-- Regular Expression Validation -->

<input type="text"
name="phone"
placeholder="Enter Phone Number"
required>



<input type="password"
name="password"
placeholder="Enter Password"
required>



<!-- Compare Field Validation -->

<input type="password"
name="confirm_password"
placeholder="Confirm Password"
required>



<input type="submit"
name="register"
value="Register">



</form>



<p>
Already have an account?

<a href="login.php">
Login
</a>

</p>



</div>


</body>

</html>
