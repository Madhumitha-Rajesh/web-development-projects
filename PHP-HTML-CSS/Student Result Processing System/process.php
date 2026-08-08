<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Result</title>

<style>

body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:linear-gradient(135deg,#667eea,#764ba2);

    font-family:Arial,sans-serif;

    padding:30px;

}


.result-card{

    width:650px;

    max-width:100%;

    background:white;

    padding:35px;

    border-radius:25px;

    box-shadow:0 20px 40px rgba(0,0,0,.25);

}


h1{

    text-align:center;

    color:#4f46e5;

}


.grade{

    text-align:center;

    font-size:35px;

    font-weight:bold;

    color:#16a34a;

    margin:20px;

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

    border-bottom:1px solid #ddd;

}


tr:nth-child(even){

    background:#f5f3ff;

}


.summary{

    margin-top:25px;

    padding:20px;

    background:#eef2ff;

    border-radius:15px;

}


a{

    display:block;

    width:200px;

    text-align:center;

    margin:25px auto 0;

    padding:12px;

    background:#4f46e5;

    color:white;

    text-decoration:none;

    border-radius:10px;

}


</style>

</head>


<body>


<div class="result-card">


<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){



    $name=$_POST["name"];

    $regno=$_POST["regno"];


    $python=$_POST["python"];

    $java=$_POST["java"];

    $database=$_POST["database"];

    $web=$_POST["web"];

    $network=$_POST["network"];




    // User-defined function for total

    function calculateTotal($a,$b,$c,$d,$e){

        return $a+$b+$c+$d+$e;

    }



    // Function for average

    function calculateAverage($total){

        return $total/5;

    }



    // Function for grade calculation

    function getGrade($average){


        if($average>=90){

            return "A+";

        }

        elseif($average>=80){

            return "A";

        }

        elseif($average>=70){

            return "B";

        }

        elseif($average>=60){

            return "C";

        }

        elseif($average>=50){

            return "D";

        }

        else{

            return "F";

        }


    }




    $total=calculateTotal(

        $python,
        $java,
        $database,
        $web,
        $network

    );


    $average=calculateAverage($total);


    $grade=getGrade($average);



    echo "

    <h1>🎓 Student Result</h1>


    <div class='grade'>

        Grade : $grade

    </div>



    <table>


    <tr>

        <th>Subject</th>

        <th>Marks</th>

    </tr>


    <tr>

        <td>Python</td>

        <td>$python</td>

    </tr>


    <tr>

        <td>Java</td>

        <td>$java</td>

    </tr>


    <tr>

        <td>Database</td>

        <td>$database</td>

    </tr>


    <tr>

        <td>Web Technology</td>

        <td>$web</td>

    </tr>


    <tr>

        <td>Computer Networks</td>

        <td>$network</td>

    </tr>



    </table>



    <div class='summary'>

        <p><b>Name:</b> $name</p>

        <p><b>Register Number:</b> $regno</p>

        <p><b>Total Marks:</b> $total / 500</p>

        <p><b>Average:</b> $average</p>

    </div>



    <a href='index.html'>

        Check Another Result

    </a>


    ";

}

else{


echo "

<h1>Invalid Access</h1>

<a href='index.html'>Go Back</a>

";


}


?>


</div>


</body>

</html>