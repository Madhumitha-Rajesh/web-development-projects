<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mobile Bill Summary</title>

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

    background:linear-gradient(135deg,#1e3a8a,#7c3aed);

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}


.container{

    width:800px;

    background:white;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0 20px 40px rgba(0,0,0,.35);

}



.header{

    background:#4f46e5;

    color:white;

    text-align:center;

    padding:30px;

}


.header h1{

    margin-bottom:8px;

}



.content{

    padding:35px;

}



table{

    width:100%;

    border-collapse:collapse;

    margin-top:20px;

}



th{

    background:#2563eb;

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

    padding:18px;

    border-radius:10px;

    text-align:center;

    font-size:22px;

    font-weight:bold;

}



.note{

    margin-top:20px;

    padding:15px;

    background:#eef2ff;

    border-left:5px solid #4f46e5;

    border-radius:8px;

}



.button{

    display:block;

    width:220px;

    margin:30px auto 0;

    padding:14px;

    background:#4f46e5;

    color:white;

    text-decoration:none;

    text-align:center;

    border-radius:10px;

    transition:.3s;

}



.button:hover{

    background:#4338ca;

}



</style>

</head>


<body>


<div class="container">


<?php


// User-defined function

function calculateBill($plan,$data,$minutes)
{

    if($plan=="Basic")
    {
        $baseCharge = 199;
    }

    elseif($plan=="Premium")
    {
        $baseCharge = 399;
    }

    else
    {
        $baseCharge = 599;
    }



    // Extra Data Charges

    if($data > 5)
    {
        $dataCharge = ($data - 5) * 20;
    }
    else
    {
        $dataCharge = 0;
    }



    // Extra Call Charges

    if($minutes > 500)
    {
        $callCharge = ($minutes - 500) * 0.50;
    }
    else
    {
        $callCharge = 0;
    }



    $total = $baseCharge + $dataCharge + $callCharge;


    return array($baseCharge,$dataCharge,$callCharge,$total);

}



if($_SERVER["REQUEST_METHOD"]=="POST")
{


    $name = trim($_POST["name"]);

    $mobile = trim($_POST["mobile"]);

    $plan = $_POST["plan"];

    $data = intval($_POST["data"]);

    $minutes = intval($_POST["minutes"]);



    if(empty($name) || empty($mobile))
    {

        echo "

        <div class='content'>

        <h2 style='text-align:center;color:red;'>

        Invalid Details

        </h2>


        <a href='index.html' class='button'>

        Go Back

        </a>


        </div>";

        exit();

    }



    list($base,$dataCharge,$callCharge,$total)=calculateBill($plan,$data,$minutes);



    echo "


    <div class='header'>

        <h1>📱 Mobile Bill Summary</h1>

        <p>Telecom Billing Portal</p>

    </div>



    <div class='content'>


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

        <td>Mobile Number</td>

        <td>$mobile</td>

    </tr>



    <tr>

        <td>Selected Plan</td>

        <td>$plan Plan</td>

    </tr>



    <tr>

        <td>Data Usage</td>

        <td>$data GB</td>

    </tr>



    <tr>

        <td>Call Usage</td>

        <td>$minutes Minutes</td>

    </tr>



    <tr>

        <td>Base Plan Charge</td>

        <td>₹ ".number_format($base,2)."</td>

    </tr>



    <tr>

        <td>Extra Data Charges</td>

        <td>₹ ".number_format($dataCharge,2)."</td>

    </tr>



    <tr>

        <td>Extra Call Charges</td>

        <td>₹ ".number_format($callCharge,2)."</td>

    </tr>


    </table>




    <div class='total'>

        Total Bill Amount : ₹ ".number_format($total,2)."

    </div>



    <div class='note'>

        <b>💡 Billing Information:</b>

        <br>

        Basic plan includes 5GB data and 500 minutes.

        Extra usage is charged according to tariff rates.

    </div>




    <a href='index.html' class='button'>

        Generate New Bill

    </a>



    </div>


    ";


}

else
{


echo "

<div class='content'>

<h2 style='text-align:center;color:red;'>

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