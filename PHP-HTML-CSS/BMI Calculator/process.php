<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>BMI Result</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:linear-gradient(135deg,#0f766e,#34d399);

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}

.container{

    width:760px;

    background:white;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0 20px 40px rgba(0,0,0,.25);

}

.header{

    background:#059669;

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

table{

    width:100%;

    border-collapse:collapse;

}

th{

    background:#10b981;

    color:white;

    padding:12px;

}

td{

    padding:12px;

    border:1px solid #ddd;

}

tr:nth-child(even){

    background:#f0fdf4;

}

.result{

    margin-top:25px;

    padding:18px;

    border-radius:10px;

    text-align:center;

    font-size:22px;

    font-weight:bold;

}

.recommendation{

    margin-top:20px;

    background:#ecfdf5;

    border-left:5px solid #10b981;

    padding:18px;

    border-radius:10px;

    line-height:1.8;

}

.button{

    display:block;

    width:220px;

    margin:30px auto 0;

    text-align:center;

    text-decoration:none;

    background:#10b981;

    color:white;

    padding:14px;

    border-radius:10px;

    transition:.3s;

}

.button:hover{

    background:#059669;

}

</style>

</head>

<body>

<div class="container">

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $name = trim($_POST["name"]);
    $height = floatval($_POST["height"]);
    $weight = floatval($_POST["weight"]);

    if(empty($name) || $height <= 0 || $weight <= 0)
    {

        echo "

        <div class='content'>

        <h2 style='text-align:center;color:red;'>

        Invalid Input

        </h2>

        <a href='index.html' class='button'>Go Back</a>

        </div>";

        exit();

    }

    $bmi = $weight / ($height * $height);

    $status = "";
    $recommendation = "";
    $color = "";

    if($bmi < 18.5)
    {
        $status = "Underweight";
        $color = "#2563eb";
        $recommendation = "Increase your calorie intake with healthy foods, include protein-rich meals, and consult a healthcare professional if necessary.";
    }
    elseif($bmi < 25)
    {
        $status = "Normal Weight";
        $color = "#16a34a";
        $recommendation = "Excellent! Maintain a balanced diet, exercise regularly, stay hydrated, and continue your healthy lifestyle.";
    }
    elseif($bmi < 30)
    {
        $status = "Overweight";
        $color = "#ea580c";
        $recommendation = "Increase physical activity, reduce sugary foods, eat more vegetables, and maintain a balanced diet.";
    }
    else
    {
        $status = "Obese";
        $color = "#dc2626";
        $recommendation = "Consult a healthcare professional, follow a healthy diet plan, exercise regularly, and monitor your weight.";
    }

    echo "

    <div class='header'>

        <h1>❤️ BMI Health Report</h1>

        <p>Health & Fitness Portal</p>

    </div>

    <div class='content'>

        <table>

            <tr>
                <th>Details</th>
                <th>Information</th>
            </tr>

            <tr>
                <td>Name</td>
                <td>$name</td>
            </tr>

            <tr>
                <td>Height</td>
                <td>$height m</td>
            </tr>

            <tr>
                <td>Weight</td>
                <td>$weight kg</td>
            </tr>

            <tr>
                <td>BMI</td>
                <td>".number_format($bmi,2)."</td>
            </tr>

        </table>

        <div class='result' style='background:$color;color:white;'>

            Health Status : $status

        </div>

        <div class='recommendation'>

            <h3>Health Recommendation</h3>

            <p>$recommendation</p>

        </div>

        <a href='index.html' class='button'>

            Calculate Again

        </a>

    </div>";

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

    </div>";

}

?>

</div>

</body>

</html>