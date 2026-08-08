<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Performance Evaluation Result</title>


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

    background:#09090b;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:800px;

    background:#18181b;

    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 25px 60px rgba(0,0,0,.6);

}



.header{

    background:#27272a;

    color:white;

    text-align:center;

    padding:35px;

    border-bottom:2px solid #10b981;

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



.result{

    padding:20px;

    border-radius:15px;

    text-align:center;

    font-size:22px;

    font-weight:bold;

    margin-bottom:25px;

}



.excellent{

    background:#064e3b;

    color:#6ee7b7;

}



.good{

    background:#1e3a8a;

    color:#bfdbfe;

}



.average{

    background:#78350f;

    color:#fde68a;

}



.poor{

    background:#7f1d1d;

    color:#fecaca;

}



.profile{

    background:#27272a;

    padding:25px;

    border-radius:18px;

}



.profile h2{

    color:#10b981;

    text-align:center;

    margin-bottom:20px;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:14px;

    color:white;

    border-bottom:1px solid #3f3f46;

}



td:first-child{

    color:#a7f3d0;

    font-weight:600;

}



.score{

    margin-top:25px;

    padding:20px;

    background:#10b981;

    color:#022c22;

    border-radius:15px;

    text-align:center;

    font-size:28px;

    font-weight:bold;

}



.button{

    display:block;

    width:240px;

    margin:30px auto 0;

    padding:14px;

    background:#10b981;

    color:#022c22;

    text-align:center;

    text-decoration:none;

    border-radius:12px;

    font-weight:bold;

}



.button:hover{

    background:#34d399;

}


</style>


</head>


<body>


<div class="container">


<?php


if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $name = trim($_POST["name"]);

    $id = trim($_POST["id"]);

    $score = intval($_POST["score"]);




    // Validation

    if(empty($name) || empty($id) || $score < 0 || $score > 100)

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Performance Details

        </h2>


        <a href='index.html' class='button'>

        Go Back

        </a>


        </div>";

        exit();

    }





    // Decision making statements


    if($score >= 90)

    {

        $rating = "Excellent";

        $message = "Outstanding Performance";

        $class = "excellent";

    }

    elseif($score >= 75)

    {

        $rating = "Good";

        $message = "Very Good Performance";

        $class = "good";

    }

    elseif($score >= 50)

    {

        $rating = "Average";

        $message = "Needs Improvement";

        $class = "average";

    }

    else

    {

        $rating = "Poor";

        $message = "Performance Improvement Required";

        $class = "poor";

    }




    $evaluationID = "EVAL".rand(1000,9999);





    echo "


    <div class='header'>


        <div class='icon'>

        📊

        </div>


        <h1>

        Evaluation Report

        </h1>


        <p>

        Employee Performance Dashboard

        </p>


    </div>




    <div class='content'>


        <div class='result $class'>

        $rating

        <br>

        <small>$message</small>

        </div>




        <div class='profile'>


        <h2>

        Employee Evaluation

        </h2>



        <table>


        <tr>

            <td>Evaluation ID</td>

            <td>$evaluationID</td>

        </tr>



        <tr>

            <td>Employee Name</td>

            <td>$name</td>

        </tr>



        <tr>

            <td>Employee ID</td>

            <td>$id</td>

        </tr>



        <tr>

            <td>Performance Rating</td>

            <td>$rating</td>

        </tr>



        </table>




        <div class='score'>

        Score : $score / 100

        </div>



        </div>




        <a href='index.html' class='button'>

        Evaluate Another

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