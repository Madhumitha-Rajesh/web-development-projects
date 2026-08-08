<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sales Report</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:linear-gradient(135deg,#2563eb,#60a5fa);

    display:flex;

    justify-content:center;

    align-items:center;

    min-height:100vh;

    padding:30px;

}

.container{

    width:750px;

    background:white;

    border-radius:18px;

    overflow:hidden;

    box-shadow:0 15px 35px rgba(0,0,0,.25);

}

.header{

    background:#ea580c;

    color:white;

    text-align:center;

    padding:30px;

}

.header h1{

    margin-top:10px;

}

.content{

    padding:35px;

}

.bill{

    background:#fff7ed;

    border-left:5px solid #ea580c;

    padding:15px;

    margin-bottom:25px;

    text-align:center;

    border-radius:8px;

    font-weight:bold;

    color:#9a3412;

}

table{

    width:100%;

    border-collapse:collapse;

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

.button{

    display:block;

    width:220px;

    margin:30px auto 0;

    text-align:center;

    text-decoration:none;

    background:#2563eb;

    color:white;

    padding:14px;

    border-radius:10px;

    transition:.3s;

}

.button:hover{

    background:#1d4ed8;

}

</style>

</head>

<body>

<div class="container">

<?php

// User-defined Function
function calculateSales($quantity, $price)
{
    return $quantity * $price;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $product = trim($_POST["product"]);
    $quantity = intval($_POST["quantity"]);
    $price = floatval($_POST["price"]);

    if(empty($product) || $quantity <= 0 || $price <= 0)
    {

        echo "

        <div class='content'>

        <h2 style='text-align:center;color:red;'>

        Invalid Input Details

        </h2>

        <a href='index.html' class='button'>Go Back</a>

        </div>

        ";

        exit();

    }

    $sales = calculateSales($quantity, $price);

    $invoiceNo = "INV".rand(1000,9999);

    echo "

    <div class='header'>

        <h1>🛒 Sales Invoice</h1>

        <p>Retail Sales Calculator</p>

    </div>

    <div class='content'>

        <div class='bill'>

            Invoice Number : $invoiceNo

        </div>

        <table>

        <tr>

            <th>Details</th>

            <th>Information</th>

        </tr>

        <tr>

            <td>Product Name</td>

            <td>$product</td>

        </tr>

        <tr>

            <td>Quantity</td>

            <td>$quantity</td>

        </tr>

        <tr>

            <td>Price per Unit</td>

            <td>₹ ".number_format($price,2)."</td>

        </tr>

        </table>

        <div class='total'>

            Total Sales Value : ₹ ".number_format($sales,2)."

        </div>

        <a href='index.html' class='button'>

            Calculate Another Sale

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