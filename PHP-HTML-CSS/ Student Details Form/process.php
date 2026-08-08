<!DOCTYPE html>
<html>
<head>

<title>Student Details</title>

<link rel="stylesheet" href="style.css">

<style>

.result{

width:600px;

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 15px 35px rgba(0,0,0,.2);

}

table{

width:100%;

border-collapse:collapse;

margin-top:20px;

}

th{

background:#2196f3;

color:white;

padding:12px;

}

td{

padding:12px;

border:1px solid #ddd;

}

tr:nth-child(even){

background:#f2f2f2;

}

a{

display:inline-block;

margin-top:25px;

text-decoration:none;

background:#2196f3;

color:white;

padding:12px 25px;

border-radius:8px;

}

</style>

</head>

<body>

<div class="result">

<h1 align="center">🎉 Student Details Submitted Successfully</h1>

<?php

$name=$_POST["name"];

$reg=$_POST["regno"];

$dept=$_POST["department"];

$year=$_POST["year"];

$gender=$_POST["gender"];

$email=$_POST["email"];

$mobile=$_POST["mobile"];

$address=$_POST["address"];

echo "

<table>

<tr>

<th>Field</th>

<th>Information</th>

</tr>

<tr>

<td>Name</td>

<td>$name</td>

</tr>

<tr>

<td>Register Number</td>

<td>$reg</td>

</tr>

<tr>

<td>Department</td>

<td>$dept</td>

</tr>

<tr>

<td>Year</td>

<td>$year</td>

</tr>

<tr>

<td>Gender</td>

<td>$gender</td>

</tr>

<tr>

<td>Email</td>

<td>$email</td>

</tr>

<tr>

<td>Mobile</td>

<td>$mobile</td>

</tr>

<tr>

<td>Address</td>

<td>$address</td>

</tr>

</table>

";

?>

<center>

<a href="index.html">⬅ Back to Form</a>

</center>

</div>

</body>
</html>