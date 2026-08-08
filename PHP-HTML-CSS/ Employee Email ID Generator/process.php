<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Generated Email ID</title>

<style>

body{

    background:linear-gradient(135deg,#1e3c72,#2a5298);

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:'Poppins',sans-serif;

}

.card{

    width:600px;

    background:white;

    padding:35px;

    border-radius:20px;

    box-shadow:0 20px 40px rgba(0,0,0,.25);

}

h1{

    text-align:center;

    color:#2563eb;

}

table{

    width:100%;

    border-collapse:collapse;

    margin-top:25px;

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

    background:#f3f6ff;

}

.email{

    margin-top:25px;

    background:#dbeafe;

    padding:18px;

    text-align:center;

    border-radius:12px;

    font-size:22px;

    font-weight:bold;

    color:#1e40af;

}

a{

    display:block;

    width:200px;

    margin:25px auto 0;

    text-align:center;

    padding:12px;

    background:#2563eb;

    color:white;

    text-decoration:none;

    border-radius:10px;

}

</style>

</head>

<body>

<div class="card">

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=$_POST["name"];
    $department=$_POST["department"];

    // String Manipulation Functions

    $name=strtolower($name);              // convert to lowercase

    $name=trim($name);                    // remove extra spaces

    $name=str_replace(" ",".",$name);     // replace spaces with dots

    $email=$name."@company.com";

    echo "

    <h1>Employee Email Generated</h1>

    <table>

    <tr>

    <th>Field</th>

    <th>Details</th>

    </tr>

    <tr>

    <td>Employee Name</td>

    <td>".ucwords(str_replace("."," ",$name))."</td>

    </tr>

    <tr>

    <td>Department</td>

    <td>$department</td>

    </tr>

    </table>

    <div class='email'>

    📧 $email

    </div>

    <a href='index.html'>Generate Another Email</a>

    ";

}

else{

    echo "<h2>Invalid Access</h2>";

}

?>

</div>

</body>

</html>