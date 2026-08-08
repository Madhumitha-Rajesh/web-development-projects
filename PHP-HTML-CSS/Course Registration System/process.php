<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Course Registration Confirmation</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

    background:linear-gradient(135deg,#4f46e5,#9333ea);

}

.card{

    width:750px;

    max-width:100%;

    background:white;

    padding:35px;

    border-radius:20px;

    box-shadow:0 20px 40px rgba(0,0,0,.25);

}

.success{

    text-align:center;

    font-size:55px;

    color:#16a34a;

}

h1{

    text-align:center;

    color:#4f46e5;

    margin-bottom:10px;

}

.message{

    text-align:center;

    color:#666;

    margin-bottom:20px;

}

.regid{

    background:#eef2ff;

    color:#4338ca;

    padding:15px;

    text-align:center;

    border-radius:10px;

    font-weight:bold;

    margin-bottom:20px;

}

table{

    width:100%;

    border-collapse:collapse;

}

th{

    background:#4f46e5;

    color:white;

    padding:12px;

}

td{

    padding:12px;

    border:1px solid #ddd;

}

tr:nth-child(even){

    background:#f5f3ff;

}

.button{

    display:block;

    width:220px;

    margin:25px auto 0;

    text-align:center;

    padding:12px;

    background:#4f46e5;

    color:white;

    text-decoration:none;

    border-radius:10px;

    transition:.3s;

}

.button:hover{

    background:#3730a3;

}

</style>

</head>

<body>

<div class="card">

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    // Get form data

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $batch = $_POST["batch"];
    $qualification = $_POST["qualification"];
    $address = trim($_POST["address"]);

    // Server-side validation

    if(empty($name) || empty($email) || empty($mobile) || empty($dob) ||
       empty($gender) || empty($course) || empty($batch) ||
       empty($qualification) || empty($address)){

        echo "<h2 style='color:red;text-align:center;'>All fields are required.</h2>";
        echo "<a href='index.html' class='button'>Go Back</a>";
        exit();
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        echo "<h2 style='color:red;text-align:center;'>Invalid Email Address.</h2>";
        echo "<a href='index.html' class='button'>Go Back</a>";
        exit();
    }

    if(!preg_match("/^[0-9]{10}$/",$mobile)){

        echo "<h2 style='color:red;text-align:center;'>Mobile number must contain exactly 10 digits.</h2>";
        echo "<a href='index.html' class='button'>Go Back</a>";
        exit();
    }

    // Registration ID

    $registrationID = "CRS".rand(10000,99999);

    echo "

    <div class='success'>✅</div>

    <h1>Registration Successful</h1>

    <p class='message'>
        Thank you for registering. Your course registration has been completed successfully.
    </p>

    <div class='regid'>
        Registration ID : $registrationID
    </div>

    <table>

        <tr>

            <th>Field</th>

            <th>Details</th>

        </tr>

        <tr>

            <td>Student Name</td>

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

            <td>Gender</td>

            <td>$gender</td>

        </tr>

        <tr>

            <td>Course</td>

            <td>$course</td>

        </tr>

        <tr>

            <td>Preferred Batch</td>

            <td>$batch</td>

        </tr>

        <tr>

            <td>Qualification</td>

            <td>$qualification</td>

        </tr>

        <tr>

            <td>Address</td>

            <td>$address</td>

        </tr>

    </table>

    <a href='index.html' class='button'>
        Register Another Student
    </a>

    ";

}

else{

    echo "

    <h2 style='text-align:center;color:red;'>
        Invalid Request
    </h2>

    <p style='text-align:center;'>
        Please fill out the registration form first.
    </p>

    <a href='index.html' class='button'>
        Go Back
    </a>

    ";

}

?>

</div>

</body>

</html>