<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Salary Slip</title>


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

    linear-gradient(135deg,#0f172a,#334155);

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:800px;

    background:#f8fafc;

    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 25px 50px rgba(0,0,0,.35);

}



.header{

    background:

    linear-gradient(135deg,#111827,#b45309);

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

    margin-bottom:25px;

}



.salary-card{

    background:white;

    border-radius:20px;

    padding:25px;

    border:2px solid #fde68a;

}



.salary-card h2{

    text-align:center;

    color:#92400e;

    margin-bottom:20px;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:13px;

    border-bottom:1px solid #e5e7eb;

}



td:first-child{

    font-weight:600;

    color:#475569;

}



.total{

    margin-top:25px;

    padding:20px;

    background:#fef3c7;

    border-radius:15px;

    text-align:center;

    color:#92400e;

    font-size:24px;

    font-weight:bold;

}



.button{

    display:block;

    width:230px;

    margin:30px auto 0;

    padding:14px;

    background:#92400e;

    color:white;

    text-align:center;

    text-decoration:none;

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



// Function to calculate gross salary

function calculateGross($basic,$hra,$allowance)

{

    return $basic + $hra + $allowance;

}




// Function to calculate deduction amount

function calculateDeduction($gross,$percentage)

{

    return ($gross * $percentage) / 100;

}




// Function to calculate net salary

function calculateNetSalary($gross,$deduction)

{

    return $gross - $deduction;

}





if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $name = trim($_POST["name"]);

    $id = trim($_POST["id"]);

    $basic = floatval($_POST["basic"]);

    $hra = floatval($_POST["hra"]);

    $allowance = floatval($_POST["allowance"]);

    $deductionPercentage = floatval($_POST["deduction"]);




    // Validation

    if(empty($name) || empty($id) || $basic<0 || $hra<0 || $allowance<0 || $deductionPercentage<0)

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Salary Details

        </h2>


        <a href='index.html' class='button'>

        Go Back

        </a>


        </div>";

        exit();

    }





    $gross = calculateGross($basic,$hra,$allowance);


    $deduction = calculateDeduction($gross,$deductionPercentage);


    $netSalary = calculateNetSalary($gross,$deduction);



    echo "


    <div class='header'>


        <div class='icon'>

        💼

        </div>


        <h1>

        Employee Salary Slip

        </h1>


        <p>

        Smart Payroll System

        </p>


    </div>




    <div class='content'>


        <div class='success'>

        ✅ Salary Processed Successfully

        </div>




        <div class='salary-card'>


        <h2>

        Salary Details

        </h2>




        <table>


        <tr>

            <td>Employee Name</td>

            <td>$name</td>

        </tr>



        <tr>

            <td>Employee ID</td>

            <td>$id</td>

        </tr>



        <tr>

            <td>Basic Salary</td>

            <td>₹ ".number_format($basic)."</td>

        </tr>



        <tr>

            <td>HRA</td>

            <td>₹ ".number_format($hra)."</td>

        </tr>



        <tr>

            <td>Allowance</td>

            <td>₹ ".number_format($allowance)."</td>

        </tr>



        <tr>

            <td>Gross Salary</td>

            <td>₹ ".number_format($gross)."</td>

        </tr>



        <tr>

            <td>Deduction ($deductionPercentage%)</td>

            <td>₹ ".number_format($deduction)."</td>

        </tr>



        </table>




        <div class='total'>

        Net Salary : ₹ ".number_format($netSalary)."

        </div>




        </div>




        <a href='index.html' class='button'>

        Process Another Salary

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