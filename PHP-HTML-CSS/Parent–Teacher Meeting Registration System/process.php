<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Appointment Confirmation</title>


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

    background:#fef3c7;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.confirmation{

    width:750px;

    max-width:100%;

    background:#ffffff;

    border-radius:35px;

    padding:35px;

    box-shadow:

    0 25px 60px rgba(51,65,85,.18);

}



/* Header */

.header{

    background:#dbeafe;

    padding:30px;

    border-radius:25px;

    text-align:center;

}



.header-icon{

    width:100px;

    height:100px;

    background:white;

    border-radius:30px;

    display:flex;

    justify-content:center;

    align-items:center;

    margin:auto;

    font-size:50px;

}



.header h1{

    margin-top:15px;

    color:#1e3a8a;

}



.header p{

    color:#475569;

}



/* Success */

.success{

    margin:25px 0;

    background:#d1fae5;

    color:#065f46;

    padding:18px;

    border-radius:20px;

    text-align:center;

    font-weight:600;

    font-size:20px;

}



/* Ticket */

.ticket{

    background:#fafafa;

    border:2px dashed #a78bfa;

    border-radius:25px;

    padding:25px;

}



.ticket h2{

    text-align:center;

    color:#7c3aed;

    margin-bottom:20px;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:14px;

    border-bottom:1px solid #e2e8f0;

}



td:first-child{

    color:#334155;

    font-weight:600;

}



.appointment-id{

    margin-top:25px;

    padding:18px;

    background:#ede9fe;

    color:#5b21b6;

    border-radius:20px;

    text-align:center;

    font-size:22px;

    font-weight:bold;

}



.button{

    display:block;

    width:240px;

    margin:30px auto 0;

    padding:14px;

    text-align:center;

    text-decoration:none;

    background:#a78bfa;

    color:white;

    border-radius:20px;

    font-weight:600;

}



.button:hover{

    background:#7c3aed;

}



</style>


</head>


<body>


<div class="confirmation">


<?php


if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $parent = trim($_POST["parent"]);

    $student = trim($_POST["student"]);

    $class = $_POST["class"];

    $slot = $_POST["slot"];

    $date = $_POST["date"];





    // Validation

    if(empty($parent) || empty($student) || empty($class) || empty($slot) || empty($date))

    {


        echo "

        <h2 style='color:red;text-align:center;'>

        Please fill all details!

        </h2>

        ";


        exit();

    }




    // Generate appointment ID

    $appointmentID = "PTM".rand(1000,9999);





    echo "



    <div class='header'>


        <div class='header-icon'>

            📅

        </div>


        <h1>

            Meeting Confirmed

        </h1>


        <p>

            Parent–Teacher Appointment Portal

        </p>


    </div>





    <div class='success'>

        ✅ Your meeting slot has been reserved successfully

    </div>





    <div class='ticket'>


        <h2>

            Appointment Details

        </h2>



        <table>


            <tr>

                <td>Appointment ID</td>

                <td>$appointmentID</td>

            </tr>



            <tr>

                <td>Parent Name</td>

                <td>$parent</td>

            </tr>



            <tr>

                <td>Student Name</td>

                <td>$student</td>

            </tr>



            <tr>

                <td>Class</td>

                <td>$class</td>

            </tr>



            <tr>

                <td>Meeting Date</td>

                <td>$date</td>

            </tr>



            <tr>

                <td>Selected Slot</td>

                <td>$slot</td>

            </tr>


        </table>




        <div class='appointment-id'>

            🌟 Thank you for staying involved in your child's education

        </div>



    </div>




    <a href='index.html' class='button'>

        Book Another Slot

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