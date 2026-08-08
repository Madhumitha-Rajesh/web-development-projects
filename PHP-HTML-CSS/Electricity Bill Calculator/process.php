<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Electricity Bill Summary</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:#edf4ff;

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}

.bill-box{

    width:750px;

    max-width:100%;

    background:white;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0 15px 35px rgba(0,0,0,.15);

}

.header{

    background:#1e3a8a;

    color:white;

    text-align:center;

    padding:30px;

}

.header i{

    font-size:45px;

    color:#facc15;

}

.header h1{

    margin-top:10px;

}

.content{

    padding:35px;

}

.bill-number{

    background:#fef9c3;

    border-left:5px solid #facc15;

    padding:15px;

    text-align:center;

    font-weight:bold;

    color:#854d0e;

    margin-bottom:25px;

    border-radius:8px;

}

table{

    width:100%;

    border-collapse:collapse;

}

th{

    background:#1e3a8a;

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

.total{

    margin-top:25px;

    background:#dcfce7;

    color:#166534;

    padding:20px;

    border-radius:10px;

    text-align:center;

    font-size:22px;

    font-weight:bold;

}

.button{

    display:block;

    width:220px;

    margin:25px auto 0;

    text-align:center;

    text-decoration:none;

    background:#facc15;

    color:#0f172a;

    padding:13px;

    border-radius:10px;

    font-weight:600;

}

.button:hover{

    background:#eab308;

}

</style>

</head>


<body>


<div class="bill-box">


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){


    $name = trim($_POST["name"]);

    $consumer = trim($_POST["consumer"]);

    $units = intval($_POST["units"]);



    // Validation

    if(empty($name) || empty($consumer) || $units < 0){


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Input Details

        </h2>

        <a href='index.html' class='button'>Go Back</a>

        </div>

        ";


        exit();

    }



    // Slab Calculation

    $amount = 0;


    if($units <= 100){

        $amount = $units * 1.50;

    }


    elseif($units <= 200){


        $amount = (100 * 1.50) + (($units-100) * 2.50);


    }


    elseif($units <= 300){


        $amount = (100 * 1.50) + 
                  (100 * 2.50) + 
                  (($units-200) * 4.00);


    }


    else{


        $amount = (100 * 1.50) +
                  (100 * 2.50) +
                  (100 * 4.00) +
                  (($units-300) * 6.00);


    }



    // Tax calculation

    $tax = $amount * 0.05;


    $total = $amount + $tax;



    $billNo = "EB".rand(10000,99999);



    echo "

    <div class='header'>

        <i>⚡</i>

        <h1>Electricity Bill Summary</h1>

        <p>TNEB Consumer Portal</p>

    </div>


    <div class='content'>


        <div class='bill-number'>

            Bill Number : $billNo

        </div>



        <table>


        <tr>

            <th>Details</th>

            <th>Information</th>

        </tr>



        <tr>

            <td>Customer Name</td>

            <td>$name</td>

        </tr>


        <tr>

            <td>Consumer Number</td>

            <td>$consumer</td>

        </tr>


        <tr>

            <td>Units Consumed</td>

            <td>$units Units</td>

        </tr>


        <tr>

            <td>Energy Charge</td>

            <td>₹ ".number_format($amount,2)."</td>

        </tr>


        <tr>

            <td>Tax (5%)</td>

            <td>₹ ".number_format($tax,2)."</td>

        </tr>


        </table>



        <div class='total'>

            Total Bill Amount : ₹ ".number_format($total,2)."

        </div>



        <a href='index.html' class='button'>

            Calculate Another Bill

        </a>



    </div>

    ";

}

else{


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