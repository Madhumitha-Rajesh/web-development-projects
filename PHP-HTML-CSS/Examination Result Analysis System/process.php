<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Result Report</title>


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

    background:#fff7ed;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.report{

    width:800px;

    max-width:100%;

    background:#fffbeb;

    border-radius:35px;

    padding:30px;

    border:2px solid #fed7aa;

    box-shadow:

    0 20px 45px rgba(120,53,15,.15);

}



/* Header */

.report-header{

    background:#ede9fe;

    padding:30px;

    border-radius:25px;

    text-align:center;

}



.report-header .icon{

    font-size:60px;

}



.report-header h1{

    color:#581c87;

    margin-top:10px;

}



.report-header p{

    color:#6b7280;

}



/* Result Badge */

.badge{

    margin:25px auto;

    width:max-content;

    padding:12px 30px;

    border-radius:30px;

    background:#dcfce7;

    color:#166534;

    font-weight:bold;

}



/* Student Card */

.student-card{

    background:white;

    border-radius:25px;

    padding:25px;

    border:2px solid #fde68a;

}



.student-card h2{

    text-align:center;

    color:#92400e;

    margin-bottom:20px;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:14px;

    border-bottom:1px solid #f3e8d0;

}



td:first-child{

    color:#78350f;

    font-weight:600;

}



/* Percentage Box */

.percentage{

    margin-top:25px;

    background:#f9a8d4;

    color:#831843;

    padding:20px;

    border-radius:20px;

    text-align:center;

    font-size:26px;

    font-weight:bold;

}



/* Class Box */

.class-box{

    margin-top:15px;

    background:#c4b5fd;

    color:#4c1d95;

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

    text-align:center;

    padding:14px;

    background:#c084fc;

    color:white;

    text-decoration:none;

    border-radius:18px;

}



.button:hover{

    background:#a855f7;

}



</style>

</head>


<body>


<div class="report">


<?php



// Function to calculate percentage

function calculatePercentage($m1,$m2,$m3)

{

    $total=$m1+$m2+$m3;

    return ($total/300)*100;

}



// Function to determine class

function getClass($percentage)

{

    if($percentage>=90)

    {

        return "Outstanding";

    }

    elseif($percentage>=75)

    {

        return "First Class";

    }

    elseif($percentage>=60)

    {

        return "Second Class";

    }

    elseif($percentage>=50)

    {

        return "Pass";

    }

    else

    {

        return "Fail";

    }

}





if($_SERVER["REQUEST_METHOD"]=="POST")

{


$name=trim($_POST["name"]);

$regno=trim($_POST["regno"]);

$mark1=intval($_POST["mark1"]);

$mark2=intval($_POST["mark2"]);

$mark3=intval($_POST["mark3"]);





if(empty($name)||empty($regno)||$mark1<0||$mark2<0||$mark3<0||$mark1>100||$mark2>100||$mark3>100)

{

echo "

<h2 style='color:red;text-align:center;'>

Invalid Mark Details

</h2>

";

exit();

}



$percentage=calculatePercentage($mark1,$mark2,$mark3);


$class=getClass($percentage);





echo "


<div class='report-header'>


<div class='icon'>📜</div>


<h1>

Academic Result Report

</h1>


<p>

Examination Performance Analysis

</p>


</div>




<div class='badge'>

Result Generated Successfully

</div>





<div class='student-card'>


<h2>

Student Information

</h2>



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

<td>Mathematics</td>

<td>$mark1 / 100</td>

</tr>


<tr>

<td>Science</td>

<td>$mark2 / 100</td>

</tr>


<tr>

<td>Computer</td>

<td>$mark3 / 100</td>

</tr>



</table>



<div class='percentage'>

Percentage : ".number_format($percentage,2)."%

</div>



<div class='class-box'>

Class Obtained : $class

</div>



</div>




<a href='index.html' class='button'>

Generate New Result

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