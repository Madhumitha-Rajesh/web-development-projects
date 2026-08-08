<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Success</title>


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


<style>

*{

    margin:0;

    padding:0;

    box-sizing:border-box;

    font-family:'Poppins',sans-serif;

}



body{

    min-height:100vh;

    background:#dff6ff;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:750px;

    max-width:100%;

    background:#fffef7;

    border-radius:35px;

    padding:35px;

    box-shadow:

    0 25px 60px rgba(120,53,15,.15);

}



.top{

    text-align:center;

    background:#fbcfe8;

    padding:35px;

    border-radius:25px;

}



.icon{

    width:100px;

    height:100px;

    background:white;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;

    margin:auto;

    font-size:50px;

}



.top h1{

    color:#831843;

    margin-top:15px;

}



.top p{

    color:#9f1239;

}



.success{

    margin:25px 0;

    background:#dcfce7;

    color:#166534;

    padding:18px;

    border-radius:20px;

    text-align:center;

    font-weight:bold;

    font-size:20px;

}



.customer-card{

    background:white;

    border:2px solid #bae6fd;

    border-radius:25px;

    padding:25px;

}



.customer-card h2{

    text-align:center;

    color:#0369a1;

    margin-bottom:20px;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:14px;

    border-bottom:1px solid #e0f2fe;

}



td:first-child{

    font-weight:600;

    color:#475569;

}



.customer-id{

    margin-top:25px;

    background:#fef3c7;

    color:#92400e;

    padding:18px;

    border-radius:20px;

    text-align:center;

    font-size:22px;

    font-weight:bold;

}



.button{

    display:block;

    width:230px;

    margin:30px auto 0;

    padding:14px;

    background:#fb7185;

    color:white;

    text-align:center;

    text-decoration:none;

    border-radius:20px;

    font-weight:600;

}



.button:hover{

    background:#e11d48;

}



</style>


</head>


<body>


<div class="container">


<?php


if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $name = trim($_POST["name"]);

    $email = trim($_POST["email"]);

    $mobile = trim($_POST["mobile"]);

    $city = trim($_POST["city"]);

    $password = trim($_POST["password"]);




    // Empty field validation

    if(empty($name)||empty($email)||empty($mobile)||empty($city)||empty($password))

    {

        echo "

        <h2 style='color:red;text-align:center;'>

        All fields are required!

        </h2>

        ";

        exit();

    }





    // Email validation

    if(!filter_var($email,FILTER_VALIDATE_EMAIL))

    {

        echo "

        <h2 style='color:red;text-align:center;'>

        Invalid Email Address

        </h2>

        ";

        exit();

    }





    // Mobile validation

    if(!preg_match("/^[0-9]{10}$/",$mobile))

    {

        echo "

        <h2 style='color:red;text-align:center;'>

        Enter valid 10 digit mobile number

        </h2>

        ";

        exit();

    }





    // Password validation

    if(strlen($password)<6)

    {

        echo "

        <h2 style='color:red;text-align:center;'>

        Password must contain minimum 6 characters

        </h2>

        ";

        exit();

    }




    // Generate customer ID

    $customerID="CUS".rand(10000,99999);





    echo "


    <div class='top'>


        <div class='icon'>

        🛍️

        </div>


        <h1>

        Welcome Customer!

        </h1>


        <p>

        Registration Completed Successfully

        </p>


    </div>




    <div class='success'>

    ✅ Your account has been created

    </div>





    <div class='customer-card'>


    <h2>

    Customer Profile

    </h2>




    <table>


    <tr>

        <td>Customer ID</td>

        <td>$customerID</td>

    </tr>



    <tr>

        <td>Name</td>

        <td>$name</td>

    </tr>




    <tr>

        <td>Email</td>

        <td>$email</td>

    </tr>




    <tr>

        <td>Mobile</td>

        <td>$mobile</td>

    </tr>




    <tr>

        <td>City</td>

        <td>$city</td>

    </tr>


    </table>




    <div class='customer-id'>

    🎁 Welcome to our customer family!

    </div>



    </div>




    <a href='index.html' class='button'>

    Register Another

    </a>



    ";



}

else

{

echo "

<h2 style='color:red;text-align:center;'>

Invalid Request

</h2>

";

}



?>


</div>


</body>

</html>