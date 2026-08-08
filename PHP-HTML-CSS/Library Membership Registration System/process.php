<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Library Membership Confirmation</title>


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

    background:

    linear-gradient(135deg,#78350f,#fef3c7);

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:750px;

    background:#fffaf0;

    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 20px 45px rgba(0,0,0,.3);

}



.header{

    background:

    linear-gradient(135deg,#92400e,#d97706);

    color:white;

    text-align:center;

    padding:35px;

}



.header .icon{

    font-size:60px;

}



.header h1{

    margin-top:10px;

}



.content{

    padding:35px;

}



.success{

    background:#dcfce7;

    color:#166534;

    padding:18px;

    border-radius:12px;

    text-align:center;

    font-weight:600;

    font-size:20px;

    margin-bottom:25px;

}



.membership-card{

    background:white;

    border-radius:20px;

    padding:25px;

    border:2px dashed #d97706;

}



.membership-card h2{

    text-align:center;

    color:#92400e;

    margin-bottom:20px;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:12px;

    border-bottom:1px solid #fde68a;

}



td:first-child{

    font-weight:600;

    color:#78350f;

}



.id-box{

    margin-top:25px;

    background:#fef3c7;

    padding:15px;

    border-radius:10px;

    text-align:center;

    font-size:20px;

    color:#92400e;

    font-weight:bold;

}



.button{

    display:block;

    width:220px;

    margin:30px auto 0;

    padding:14px;

    text-align:center;

    text-decoration:none;

    background:#92400e;

    color:white;

    border-radius:12px;

}



.button:hover{

    background:#78350f;

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

    $dob = $_POST["dob"];

    $membership = $_POST["membership"];

    $section = $_POST["section"];




    // Validation

    if(empty($name) || empty($email) || empty($mobile) || empty($dob) || empty($membership) || empty($section))

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        All fields are required!

        </h2>


        <a href='index.html' class='button'>

        Go Back

        </a>


        </div>";

        exit();

    }




    if(!filter_var($email,FILTER_VALIDATE_EMAIL))

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Email Address

        </h2>


        <a href='index.html' class='button'>

        Try Again

        </a>


        </div>";

        exit();

    }




    if(!preg_match("/^[0-9]{10}$/",$mobile))

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Mobile Number

        </h2>


        <a href='index.html' class='button'>

        Try Again

        </a>


        </div>";

        exit();

    }




    // Generate Membership ID

    $membershipID = "LIB".rand(10000,99999);



    echo "


    <div class='header'>


        <div class='icon'>

        📚

        </div>


        <h1>

        Membership Created

        </h1>


        <p>

        Digital Library Portal

        </p>


    </div>




    <div class='content'>


        <div class='success'>

        🎉 Registration Successful!

        </div>




        <div class='membership-card'>


        <h2>

        Library Membership Card

        </h2>




        <table>


        <tr>

        <td>Membership ID</td>

        <td>$membershipID</td>

        </tr>



        <tr>

        <td>Member Name</td>

        <td>$name</td>

        </tr>



        <tr>

        <td>Email</td>

        <td>$email</td>

        </tr>



        <tr>

        <td>Mobile Number</td>

        <td>$mobile</td>

        </tr>



        <tr>

        <td>Date of Birth</td>

        <td>$dob</td>

        </tr>



        <tr>

        <td>Membership Type</td>

        <td>$membership</td>

        </tr>



        <tr>

        <td>Preferred Section</td>

        <td>$section</td>

        </tr>


        </table>



        <div class='id-box'>

        📖 Welcome to Digital Library

        </div>



        </div>




        <a href='index.html' class='button'>

        Register New Member

        </a>



    </div>


    ";


}

else

{


echo "

<div class='content'>

<h2 style='color:red;text-align:center;'>

Invalid Request

</h2>


<a href='index.html' class='button'>

Go Back

</a>


</div>

";


}


?>


</div>


</body>

</html>