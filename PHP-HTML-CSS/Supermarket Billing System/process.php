<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Invoice</title>

    <link rel="stylesheet" href="style.css">


    <style>


        body{

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            background:linear-gradient(135deg,#11998e,#38ef7d);

            font-family:'Poppins',Arial,sans-serif;

            padding:30px;

        }



        .invoice{

            width:700px;

            max-width:100%;

            background:white;

            padding:40px;

            border-radius:25px;

            box-shadow:0 20px 40px rgba(0,0,0,0.25);

        }



        .invoice-header{

            text-align:center;

            color:#15803d;

            margin-bottom:25px;

        }



        .invoice-header i{

            font-size:50px;

            margin-bottom:10px;

        }



        table{

            width:100%;

            border-collapse:collapse;

            margin-top:25px;

        }



        th{

            background:#16a34a;

            color:white;

            padding:14px;

            text-align:left;

        }



        td{

            padding:13px;

            border-bottom:1px solid #ddd;

        }



        tr:nth-child(even){

            background:#f0fdf4;

        }



        .total-box{

            margin-top:25px;

            background:#dcfce7;

            padding:20px;

            border-radius:15px;

        }



        .total-box p{

            font-size:18px;

            margin:10px 0;

        }



        .final{

            font-size:25px;

            font-weight:bold;

            color:#15803d;

        }



        .button{

            display:block;

            text-align:center;

            margin-top:25px;

            padding:12px;

            background:#16a34a;

            color:white;

            text-decoration:none;

            border-radius:10px;

            transition:.3s;

        }



        .button:hover{

            background:#15803d;

            transform:translateY(-3px);

        }


    </style>


</head>


<body>


<div class="invoice">


<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){



    // Receiving values


    $customer = $_POST["customer"];

    $product = $_POST["product"];

    $price = $_POST["price"];

    $quantity = $_POST["quantity"];

    $discount = $_POST["discount"];

    $tax = $_POST["tax"];



    // Calculations


    $subtotal = $price * $quantity;



    $discount_amount = ($subtotal * $discount) / 100;



    $after_discount = $subtotal - $discount_amount;



    $tax_amount = ($after_discount * $tax) / 100;



    $final_amount = $after_discount + $tax_amount;



    // Invoice Number


    $invoice_no = "INV" . rand(1000,9999);



    echo "


    <div class='invoice-header'>

        <div>

            🛒

        </div>

        <h1>SuperMart Invoice</h1>

        <p>Invoice No : $invoice_no</p>

    </div>



    <table>


        <tr>

            <th>Details</th>

            <th>Information</th>

        </tr>



        <tr>

            <td>Customer Name</td>

            <td>$customer</td>

        </tr>



        <tr>

            <td>Product Name</td>

            <td>$product</td>

        </tr>



        <tr>

            <td>Price Per Unit</td>

            <td>₹ $price</td>

        </tr>



        <tr>

            <td>Quantity</td>

            <td>$quantity</td>

        </tr>



        <tr>

            <td>Subtotal</td>

            <td>₹ $subtotal</td>

        </tr>



        <tr>

            <td>Discount ($discount%)</td>

            <td>₹ $discount_amount</td>

        </tr>



        <tr>

            <td>GST ($tax%)</td>

            <td>₹ $tax_amount</td>

        </tr>



    </table>




    <div class='total-box'>


        <p>

        Amount Payable:

        </p>


        <p class='final'>

        ₹ $final_amount

        </p>


    </div>




    <a href='index.html' class='button'>

        Generate Another Bill

    </a>


    ";



}

else{


    echo "

        <h2>

        Invalid Access

        </h2>


        <p>

        Please enter product details first.

        </p>


        <a href='index.html' class='button'>

        Go Back

        </a>

    ";


}


?>


</div>


</body>

</html>