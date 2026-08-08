<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Policy Summary</title>


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

    background:#e6fffb;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:800px;

    max-width:100%;

    background:white;

    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 20px 50px rgba(15,23,42,.2);

}



.header{

    background:#0f172a;

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

    background:#ccfbf1;

    color:#115e59;

    padding:18px;

    border-radius:12px;

    text-align:center;

    font-weight:600;

    font-size:20px;

    margin-bottom:25px;

}



.policy-card{

    border:2px solid #99f6e4;

    border-radius:20px;

    padding:25px;

}



.policy-card h2{

    text-align:center;

    color:#0f766e;

    margin-bottom:20px;

}



table{

    width:100%;

    border-collapse:collapse;

}



td{

    padding:13px;

    border-bottom:1px solid #ccfbf1;

}



td:first-child{

    font-weight:600;

    color:#134e4a;

}



.amount{

    margin-top:25px;

    padding:20px;

    text-align:center;

    border-radius:15px;

    background:#0f766e;

    color:white;

    font-size:25px;

    font-weight:bold;

}



.button{

    display:block;

    width:230px;

    margin:30px auto 0;

    padding:14px;

    text-align:center;

    background:#14b8a6;

    color:white;

    text-decoration:none;

    border-radius:12px;

}



.button:hover{

    background:#0f766e;

}


</style>

</head>


<body>


<div class="container">


<?php



// User-defined function to calculate premium

function calculatePremium($age,$term,$coverage)

{


    // Base premium based on coverage

    $premium = ($coverage * 0.02);



    // Age factor

    if($age <= 30)

    {

        $premium += 1000;

    }

    elseif($age <= 50)

    {

        $premium += 2500;

    }

    else

    {

        $premium += 5000;

    }



    // Policy term factor

    if($term >= 20)

    {

        $premium += 3000;

    }

    elseif($term >= 10)

    {

        $premium += 1500;

    }



    return $premium;


}





if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $name = trim($_POST["name"]);

    $age = intval($_POST["age"]);

    $term = intval($_POST["term"]);

    $coverage = floatval($_POST["coverage"]);





    // Validation

    if(empty($name) || $age<=0 || $term<=0 || $coverage<=0)

    {


        echo "

        <div class='content'>

        <h2 style='color:red;text-align:center;'>

        Invalid Policy Details

        </h2>


        <a href='index.html' class='button'>

        Go Back

        </a>


        </div>";

        exit();

    }





    $premium = calculatePremium($age,$term,$coverage);




    $policyID = "INS".rand(10000,99999);





    echo "


    <div class='header'>


        <div class='icon'>

        🛡️

        </div>


        <h1>

        Policy Summary

        </h1>


        <p>

        SecureLife Insurance

        </p>


    </div>




    <div class='content'>


        <div class='success'>

        ✅ Premium Calculated Successfully

        </div>




        <div class='policy-card'>


        <h2>

        Insurance Details

        </h2>




        <table>


        <tr>

            <td>Policy ID</td>

            <td>$policyID</td>

        </tr>



        <tr>

            <td>Customer Name</td>

            <td>$name</td>

        </tr>



        <tr>

            <td>Age</td>

            <td>$age Years</td>

        </tr>



        <tr>

            <td>Policy Term</td>

            <td>$term Years</td>

        </tr>



        <tr>

            <td>Coverage Amount</td>

            <td>₹ ".number_format($coverage)."</td>

        </tr>



        </table>




        <div class='amount'>

        Annual Premium : ₹ ".number_format($premium)."

        </div>




        </div>




        <a href='index.html' class='button'>

        Calculate Again

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