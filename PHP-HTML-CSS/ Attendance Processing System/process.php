<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Attendance Report</title>


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

    linear-gradient(135deg,#1e3a8a,#dbeafe);

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:750px;

    background:white;

    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 20px 45px rgba(0,0,0,.25);

}



.header{

    background:

    linear-gradient(135deg,#1d4ed8,#2563eb);

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



.status{

    padding:18px;

    border-radius:12px;

    text-align:center;

    font-size:20px;

    font-weight:600;

    margin-bottom:25px;

}



.eligible{

    background:#dcfce7;

    color:#166534;

}



.noteligible{

    background:#fee2e2;

    color:#991b1b;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:13px;

    border-bottom:1px solid #dbeafe;

}



td:first-child{

    font-weight:600;

    color:#1e40af;

}



.percentage{

    margin-top:25px;

    padding:20px;

    background:#eff6ff;

    border-radius:15px;

    text-align:center;

    color:#1d4ed8;

    font-size:24px;

    font-weight:bold;

}



.button{

    display:block;

    width:230px;

    margin:30px auto 0;

    text-align:center;

    padding:14px;

    background:#2563eb;

    color:white;

    text-decoration:none;

    border-radius:12px;

}



.button:hover{

    background:#1d4ed8;

}


</style>

</head>


<body>


<div class="container">


<?php



// User-defined function

function calculateAttendance($present,$total)

{

    if($total<=0)

    {

        return 0;

    }


    $percentage = ($present/$total)*100;


    return round($percentage,2);

}




if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $name = trim($_POST["name"]);

    $regno = trim($_POST["regno"]);

    $total = intval($_POST["total"]);

    $present = intval($_POST["present"]);

    $minimum = intval($_POST["minimum"]);




    // Validation

    if(empty($name) || empty($regno) || $total<=0 || $present<0 || $present>$total)

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Attendance Details

        </h2>


        <a href='index.html' class='button'>

        Go Back

        </a>


        </div>";

        exit();

    }





    $percentage = calculateAttendance($present,$total);



    // Eligibility checking

    if($percentage >= $minimum)

    {

        $message="Eligible for Examination";

        $class="eligible";

    }

    else

    {

        $message="Not Eligible for Examination";

        $class="noteligible";

    }





    echo "


    <div class='header'>


        <div class='icon'>

        🎓

        </div>


        <h1>

        Attendance Report

        </h1>


        <p>

        Smart Attendance Portal

        </p>


    </div>



    <div class='content'>


        <div class='status $class'>

        $message

        </div>




        <table>


        <tr>

            <td>Student Name</td>

            <td>$name</td>

        </tr>



        <tr>

            <td>Register Number</td>

            <td>$regno</td>

        </tr>



        <tr>

            <td>Total Working Days</td>

            <td>$total Days</td>

        </tr>



        <tr>

            <td>Days Present</td>

            <td>$present Days</td>

        </tr>



        <tr>

            <td>Required Attendance</td>

            <td>$minimum%</td>

        </tr>



        </table>




        <div class='percentage'>

        Attendance Percentage : $percentage%

        </div>




        <a href='index.html' class='button'>

        Check Another Student

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