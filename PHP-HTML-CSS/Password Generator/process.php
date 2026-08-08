<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Password Result</title>


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

    background:linear-gradient(135deg,#020617,#111827);

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



.container{

    width:600px;

    background:#0f172a;

    color:white;

    border-radius:25px;

    padding:40px;

    text-align:center;

    box-shadow:

    0 20px 50px rgba(0,0,0,.5);

}



.icon{

    font-size:70px;

    margin-bottom:15px;

}



h1{

    color:#4ade80;

    margin-bottom:10px;

}



.subtitle{

    color:#cbd5e1;

    margin-bottom:30px;

}



.password-box{

    background:#020617;

    border:2px solid #22c55e;

    padding:20px;

    border-radius:15px;

    font-size:24px;

    color:#4ade80;

    letter-spacing:2px;

    margin:25px 0;

    word-break:break-all;

}



.details{

    background:#1e293b;

    padding:20px;

    border-radius:15px;

    text-align:left;

}



.details p{

    margin:10px 0;

    color:#e2e8f0;

}



.button{

    display:block;

    margin-top:30px;

    padding:14px;

    background:#22c55e;

    color:#022c22;

    text-decoration:none;

    border-radius:12px;

    font-weight:700;

}



.button:hover{

    background:#4ade80;

}


</style>


</head>


<body>



<div class="container">


<?php



// Function to generate password

function generatePassword($length)

{


    $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $lowercase = "abcdefghijklmnopqrstuvwxyz";

    $numbers = "0123456789";

    $special = "@#$%&*!";


    // Combine all characters

    $allCharacters = $uppercase . $lowercase . $numbers . $special;



    $password = "";



    // Ensure required character types

    $password .= $uppercase[rand(0, strlen($uppercase)-1)];

    $password .= $lowercase[rand(0, strlen($lowercase)-1)];

    $password .= $numbers[rand(0, strlen($numbers)-1)];

    $password .= $special[rand(0, strlen($special)-1)];



    // Generate remaining characters

    for($i=4; $i<$length; $i++)

    {

        $password .= $allCharacters[rand(0, strlen($allCharacters)-1)];

    }



    // Shuffle password characters

    return str_shuffle($password);


}




if($_SERVER["REQUEST_METHOD"]=="POST")

{


    $length = intval($_POST["length"]);



    if($length < 6)

    {

        $length = 6;

    }



    if($length > 20)

    {

        $length = 20;

    }



    $password = generatePassword($length);



    echo "


    <div class='icon'>

    🔐

    </div>



    <h1>

    Secure Password Generated

    </h1>



    <p class='subtitle'>

    Your strong password is ready

    </p>



    <div class='password-box'>

    $password

    </div>



    <div class='details'>


    <p>✅ Uppercase Letters Included</p>

    <p>✅ Lowercase Letters Included</p>

    <p>✅ Numbers Included</p>

    <p>✅ Special Characters Included</p>

    <p>🔢 Password Length : $length characters</p>


    </div>



    <a href='index.html' class='button'>

    Generate Another Password

    </a>



    ";


}

else

{


echo "

<h1 style='color:red'>

Invalid Request

</h1>


<a href='index.html' class='button'>

Go Back

</a>

";


}



?>


</div>



</body>

</html>