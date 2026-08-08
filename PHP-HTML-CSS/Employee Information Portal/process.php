<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Profile</title>


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

    background:#f1f5f9;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:800px;

    background:white;

    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 20px 40px rgba(15,23,42,.15);

}



.header{

    background:#1e293b;

    color:white;

    padding:35px;

    text-align:center;

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



.profile-card{

    border:2px solid #e0e7ff;

    border-radius:20px;

    padding:25px;

}



.profile-card h2{

    text-align:center;

    color:#4338ca;

    margin-bottom:20px;

}



.profile-badge{

    background:#fb923c;

    color:white;

    padding:10px 20px;

    width:max-content;

    margin:0 auto 20px;

    border-radius:20px;

    font-weight:bold;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:13px;

    border-bottom:1px solid #e2e8f0;

}



td:first-child{

    font-weight:600;

    color:#334155;

}



.button{

    display:block;

    width:240px;

    margin:30px auto 0;

    padding:14px;

    background:#4338ca;

    color:white;

    text-decoration:none;

    text-align:center;

    border-radius:12px;

}



.button:hover{

    background:#3730a3;

}


</style>


</head>


<body>


<div class="container">


<?php


if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $name = trim($_POST["name"]);

    $empid = trim($_POST["empid"]);

    $email = trim($_POST["email"]);

    $department = $_POST["department"];

    $designation = trim($_POST["designation"]);

    $experience = intval($_POST["experience"]);




    // Validation


    if(empty($name) || empty($empid) || empty($email) || empty($department) || empty($designation))

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




    if($experience < 0)

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Experience

        </h2>


        <a href='index.html' class='button'>

        Try Again

        </a>


        </div>";

        exit();

    }





    // Generate employee code

    $profileID = "EMP".rand(1000,9999);




    echo "


    <div class='header'>


        <div class='icon'>

        👤

        </div>


        <h1>

        Employee Profile

        </h1>


        <p>

        HR Information Portal

        </p>


    </div>




    <div class='content'>


        <div class='success'>

        ✅ Employee Profile Created Successfully

        </div>




        <div class='profile-card'>


        <div class='profile-badge'>

        $profileID

        </div>




        <h2>

        Employee Details

        </h2>




        <table>


        <tr>

            <td>Employee Name</td>

            <td>$name</td>

        </tr>



        <tr>

            <td>Employee ID</td>

            <td>$empid</td>

        </tr>



        <tr>

            <td>Email</td>

            <td>$email</td>

        </tr>



        <tr>

            <td>Department</td>

            <td>$department</td>

        </tr>



        <tr>

            <td>Designation</td>

            <td>$designation</td>

        </tr>



        <tr>

            <td>Experience</td>

            <td>$experience Years</td>

        </tr>



        </table>




        </div>




        <a href='index.html' class='button'>

        Add Another Employee

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