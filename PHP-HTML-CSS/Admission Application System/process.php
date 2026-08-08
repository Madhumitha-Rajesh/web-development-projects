<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admission Acknowledgement</title>

    <link rel="stylesheet" href="style.css">

    <style>

        body{

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            padding:30px;

            background:linear-gradient(135deg,#4facfe,#6a11cb);

            font-family:'Poppins',Arial,sans-serif;

        }


        .ack-card{

            width:700px;

            max-width:100%;

            background:white;

            padding:35px;

            border-radius:20px;

            box-shadow:0 15px 35px rgba(0,0,0,0.25);

        }


        .success{

            text-align:center;

            color:#16a34a;

            font-size:40px;

        }


        h1{

            text-align:center;

            color:#2563eb;

            margin-bottom:10px;

        }


        .message{

            text-align:center;

            color:#555;

            margin-bottom:25px;

        }


        table{

            width:100%;

            border-collapse:collapse;

            margin-top:20px;

        }


        th{

            background:#2563eb;

            color:white;

            padding:14px;

            text-align:left;

        }


        td{

            padding:12px;

            border-bottom:1px solid #ddd;

        }


        tr:nth-child(even){

            background:#f3f6ff;

        }


        .application-id{

            background:#eef2ff;

            padding:15px;

            border-radius:10px;

            text-align:center;

            margin:20px 0;

            font-weight:bold;

            color:#4338ca;

        }


        .btn{

            display:block;

            width:200px;

            margin:25px auto 0;

            text-align:center;

            padding:12px;

            background:#2563eb;

            color:white;

            text-decoration:none;

            border-radius:10px;

            transition:.3s;

        }


        .btn:hover{

            background:#1d4ed8;

            transform:translateY(-3px);

        }


        @media(max-width:600px){

            .ack-card{

                padding:20px;

            }


            table{

                font-size:14px;

            }

        }

    </style>

</head>


<body>


<div class="ack-card">


<?php


// Checking whether form is submitted

if($_SERVER["REQUEST_METHOD"]=="POST"){


    // Getting form values

    $fullname = $_POST["fullname"];

    $dob = $_POST["dob"];

    $email = $_POST["email"];

    $mobile = $_POST["mobile"];

    $gender = $_POST["gender"];

    $course = $_POST["course"];

    $percentage = $_POST["percentage"];

    $city = $_POST["city"];

    $address = $_POST["address"];



    // Generate application number

    $application_id = "ADM".rand(10000,99999);



    echo "

        <div class='success'>

            ✔

        </div>


        <h1>

            Admission Submitted Successfully

        </h1>


        <p class='message'>

            Thank you for applying. Your application has been received.

        </p>


        <div class='application-id'>

            Application ID : $application_id

        </div>


        <table>


            <tr>

                <th>Details</th>

                <th>Information</th>

            </tr>


            <tr>

                <td>Applicant Name</td>

                <td>$fullname</td>

            </tr>


            <tr>

                <td>Date of Birth</td>

                <td>$dob</td>

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

                <td>Gender</td>

                <td>$gender</td>

            </tr>


            <tr>

                <td>Course Applied</td>

                <td>$course</td>

            </tr>


            <tr>

                <td>12th Percentage</td>

                <td>$percentage %</td>

            </tr>


            <tr>

                <td>City</td>

                <td>$city</td>

            </tr>


            <tr>

                <td>Address</td>

                <td>$address</td>

            </tr>


        </table>


        <a href='index.html' class='btn'>

            Apply Again

        </a>


    ";


}

else{


    echo "

        <h1>

            Invalid Request

        </h1>


        <p class='message'>

            Please submit the admission form first.

        </p>


        <a href='index.html' class='btn'>

            Go Back

        </a>

    ";


}


?>


</div>


</body>

</html>