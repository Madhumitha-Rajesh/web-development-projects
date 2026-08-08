<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Banking Dashboard</title>

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

    background:linear-gradient(135deg,#020617,#1e3a8a);

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

    background:#1e40af;

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

    background:#facc15;

    color:#0f172a;

    padding:12px;

}



td{

    padding:12px;

    border:1px solid #ddd;

}



tr:nth-child(even){

    background:#f8fafc;

}



/* Success Message */

.success{

    margin-top:25px;

    background:#dcfce7;

    color:#166534;

    padding:18px;

    text-align:center;

    border-radius:10px;

    font-weight:600;

    font-size:18px;

}



/* Error Message */

.error{

    margin-top:25px;

    background:#fee2e2;

    color:#991b1b;

    padding:18px;

    text-align:center;

    border-radius:10px;

    font-weight:600;

}



.button{

    display:block;

    width:220px;

    margin:30px auto 0;

    padding:14px;

    text-align:center;

    text-decoration:none;

    background:#1e40af;

    color:white;

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


if($_SERVER["REQUEST_METHOD"]=="POST")
{


    $customer = $_POST["customer"];

    $password = $_POST["password"];



    // Predefined Customer Details

    $validCustomer = "CUST1001";

    $validPassword = "bank123";



    if($customer == $validCustomer && $password == $validPassword)

    {


        $name = "Arun Kumar";

        $account = "Savings Account";

        $accountNumber = "XXXX XXXX 4589";

        $balance = "₹75,500";



        echo "

        <div class='header'>

            <h1>🏦 Welcome to ABC Bank</h1>

            <p>Customer Dashboard</p>

        </div>


        <div class='content'>


        <div class='success'>

            Login Successful! Welcome $name

        </div>


        <table>


        <tr>

            <th>Account Details</th>

            <th>Information</th>

        </tr>


        <tr>

            <td>Customer Name</td>

            <td>$name</td>

        </tr>


        <tr>

            <td>Customer ID</td>

            <td>$customer</td>

        </tr>


        <tr>

            <td>Account Type</td>

            <td>$account</td>

        </tr>


        <tr>

            <td>Account Number</td>

            <td>$accountNumber</td>

        </tr>


        <tr>

            <td>Available Balance</td>

            <td>$balance</td>

        </tr>


        </table>


        <div class='success'>

            Thank you for using ABC Bank Internet Banking.

        </div>


        <a href='index.html' class='button'>

            Logout

        </a>


        </div>

        ";


    }


    else

    {


        echo "

        <div class='header'>

            <h1>❌ Login Failed</h1>

        </div>


        <div class='content'>


        <div class='error'>

            Invalid Customer ID or Password.

            <br>

            Please check your credentials.

        </div>


        <a href='index.html' class='button'>

            Try Again

        </a>


        </div>

        ";


    }


}


else

{


echo "

<div class='header'>

<h1>Invalid Request</h1>

</div>


<div class='content'>


<div class='error'>

Please login through the banking portal.

</div>


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