<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Booking Confirmation</title>


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

    background:linear-gradient(135deg,#0ea5e9,#14b8a6);

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

    box-shadow:0 20px 45px rgba(0,0,0,.25);

}



.header{

    background:linear-gradient(135deg,#0369a1,#0f766e);

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

    font-size:20px;

    font-weight:600;

    margin-bottom:25px;

}



table{

    width:100%;

    border-collapse:collapse;

}



th{

    background:#0284c7;

    color:white;

    padding:12px;

}



td{

    padding:12px;

    border:1px solid #ddd;

}



tr:nth-child(even){

    background:#f0fdfa;

}



.total{

    margin-top:25px;

    padding:20px;

    background:#cffafe;

    color:#075985;

    border-radius:12px;

    text-align:center;

    font-size:24px;

    font-weight:bold;

}



.button{

    display:block;

    width:230px;

    margin:30px auto 0;

    text-align:center;

    padding:14px;

    background:#0284c7;

    color:white;

    text-decoration:none;

    border-radius:12px;

    transition:.3s;

}



.button:hover{

    background:#0369a1;

}


</style>

</head>


<body>


<div class="container">


<?php


if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $name = trim($_POST["name"]);

    $email = trim($_POST["email"]);

    $phone = trim($_POST["phone"]);

    $package = $_POST["package"];

    $people = intval($_POST["people"]);



    if(empty($name) || empty($email) || empty($phone) || empty($package) || $people<=0)

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Booking Details

        </h2>


        <a href='index.html' class='button'>

        Go Back

        </a>


        </div>";

        exit();

    }




    // Package price calculation function

    function calculateAmount($package,$people)

    {


        if($package=="Maldives Escape")

        {

            $price=45000;

        }

        elseif($package=="Manali Adventure")

        {

            $price=25000;

        }

        else

        {

            $price=35000;

        }


        return $price*$people;


    }




    $amount = calculateAmount($package,$people);


    $bookingID = "TRV".rand(1000,9999);




    echo "


    <div class='header'>


        <div class='icon'>

        ✈️

        </div>


        <h1>

        Booking Confirmed

        </h1>


        <p>

        Travel Explorer

        </p>


    </div>




    <div class='content'>


        <div class='success'>

        🎉 Your trip has been successfully booked!

        </div>




        <table>


        <tr>

            <th>Booking Details</th>

            <th>Information</th>

        </tr>



        <tr>

            <td>Booking ID</td>

            <td>$bookingID</td>

        </tr>



        <tr>

            <td>Customer Name</td>

            <td>$name</td>

        </tr>



        <tr>

            <td>Email</td>

            <td>$email</td>

        </tr>



        <tr>

            <td>Phone Number</td>

            <td>$phone</td>

        </tr>



        <tr>

            <td>Selected Package</td>

            <td>$package</td>

        </tr>



        <tr>

            <td>Number of Travelers</td>

            <td>$people</td>

        </tr>



        </table>




        <div class='total'>

        Total Amount : ₹ ".number_format($amount)."

        </div>




        <a href='index.html' class='button'>

        Book Another Trip

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