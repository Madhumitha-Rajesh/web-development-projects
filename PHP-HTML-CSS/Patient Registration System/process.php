<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Patient Registration Confirmation</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:#eef5fb;

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}

.card{

    width:850px;

    max-width:100%;

    background:white;

    border-radius:18px;

    overflow:hidden;

    box-shadow:0 12px 30px rgba(0,0,0,.15);

}

.header{

    background:#0f4c81;

    color:white;

    text-align:center;

    padding:25px;

}

.header h1{

    margin-bottom:8px;

}

.success{

    font-size:50px;

    margin-bottom:10px;

}

.content{

    padding:35px;

}

.patient-id{

    background:#e0f2fe;

    color:#0f4c81;

    padding:15px;

    border-left:5px solid #0284c7;

    border-radius:8px;

    font-weight:bold;

    margin-bottom:25px;

    text-align:center;

}

table{

    width:100%;

    border-collapse:collapse;

}

th{

    background:#0f4c81;

    color:white;

    padding:12px;

}

td{

    padding:12px;

    border:1px solid #ddd;

}

tr:nth-child(even){

    background:#f8fafc;

}

.footer{

    text-align:center;

    margin-top:30px;

}

.button{

    display:inline-block;

    background:#16a34a;

    color:white;

    padding:12px 25px;

    text-decoration:none;

    border-radius:8px;

    transition:.3s;

}

.button:hover{

    background:#15803d;

}

</style>

</head>

<body>

<div class="card">

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);
    $gender = $_POST["gender"];
    $blood = $_POST["blood"];
    $mobile = trim($_POST["mobile"]);
    $email = trim($_POST["email"]);
    $date = $_POST["date"];
    $department = $_POST["department"];
    $address = trim($_POST["address"]);

    // Validation

    if(
        empty($name) ||
        empty($age) ||
        empty($gender) ||
        empty($blood) ||
        empty($mobile) ||
        empty($email) ||
        empty($date) ||
        empty($department) ||
        empty($address)
    ){

        echo "<div class='content'>";
        echo "<h2 style='color:red;text-align:center;'>All fields are required.</h2>";
        echo "<div class='footer'><a href='index.html' class='button'>Go Back</a></div>";
        echo "</div>";
        exit();

    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        echo "<div class='content'>";
        echo "<h2 style='color:red;text-align:center;'>Invalid Email Address.</h2>";
        echo "<div class='footer'><a href='index.html' class='button'>Go Back</a></div>";
        echo "</div>";
        exit();

    }

    if(!preg_match("/^[0-9]{10}$/",$mobile)){

        echo "<div class='content'>";
        echo "<h2 style='color:red;text-align:center;'>Mobile number must contain exactly 10 digits.</h2>";
        echo "<div class='footer'><a href='index.html' class='button'>Go Back</a></div>";
        echo "</div>";
        exit();

    }

    // Generate Patient ID

    $patientID = "PAT".rand(10000,99999);

    echo "

    <div class='header'>

        <div class='success'>🏥</div>

        <h1>Patient Registration Successful</h1>

        <p>Your appointment has been registered successfully.</p>

    </div>

    <div class='content'>

        <div class='patient-id'>

            Patient ID : $patientID

        </div>

        <table>

            <tr>

                <th>Field</th>

                <th>Details</th>

            </tr>

            <tr>

                <td>Patient Name</td>

                <td>$name</td>

            </tr>

            <tr>

                <td>Age</td>

                <td>$age Years</td>

            </tr>

            <tr>

                <td>Gender</td>

                <td>$gender</td>

            </tr>

            <tr>

                <td>Blood Group</td>

                <td>$blood</td>

            </tr>

            <tr>

                <td>Mobile Number</td>

                <td>$mobile</td>

            </tr>

            <tr>

                <td>Email Address</td>

                <td>$email</td>

            </tr>

            <tr>

                <td>Appointment Date</td>

                <td>$date</td>

            </tr>

            <tr>

                <td>Department</td>

                <td>$department</td>

            </tr>

            <tr>

                <td>Address</td>

                <td>$address</td>

            </tr>

        </table>

        <div class='footer'>

            <a href='index.html' class='button'>

                Register Another Patient

            </a>

        </div>

    </div>

    ";

}

else{

    echo "

    <div class='content'>

        <h2 style='text-align:center;color:red;'>

            Invalid Request

        </h2>

        <p style='text-align:center;margin-top:15px;'>

            Please submit the registration form first.

        </p>

        <div class='footer'>

            <a href='index.html' class='button'>

                Go Back

            </a>

        </div>

    </div>

    ";

}

?>

</div>

</body>

</html>