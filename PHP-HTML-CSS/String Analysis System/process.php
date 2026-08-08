<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>String Analysis Report</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:#0f172a;

    display:flex;

    justify-content:center;

    align-items:center;

    min-height:100vh;

    padding:40px;

}

.container{

    width:950px;

    background:white;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0 20px 40px rgba(0,0,0,.30);

}

.header{

    background:#2563eb;

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

.cards{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:20px;

    margin-bottom:30px;

}

.card{

    color:white;

    padding:25px;

    border-radius:15px;

    text-align:center;

}

.card h2{

    font-size:36px;

    margin-bottom:10px;

}

.card p{

    font-size:18px;

}

.vowel{

    background:#2563eb;

}

.consonant{

    background:#16a34a;

}

.digit{

    background:#f59e0b;

}

.special{

    background:#dc2626;

}

.result{

    background:#f8fafc;

    border-left:5px solid #2563eb;

    padding:20px;

    border-radius:10px;

}

.result h3{

    margin-bottom:10px;

    color:#1e293b;

}

.result p{

    line-height:1.8;

    font-size:17px;

    word-break:break-word;

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

@media(max-width:700px){

.cards{

    grid-template-columns:1fr;

}

}

</style>

</head>

<body>

<div class="container">

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

$title=trim($_POST["title"]);

if(empty($title)){

echo "<div class='header'><h1>String Analyzer</h1></div>";

echo "<div class='content'>";

echo "<h2 style='text-align:center;color:red;'>Please enter a title.</h2>";

echo "<a href='index.html' class='button'>Go Back</a>";

echo "</div>";

exit();

}

$vowels=0;
$consonants=0;
$digits=0;
$special=0;

$titleLength=strlen($title);

for($i=0;$i<$titleLength;$i++){

$ch=$title[$i];

if(ctype_alpha($ch)){

if(strpos("AEIOUaeiou",$ch)!==false){

$vowels++;

}

else{

$consonants++;

}

}

elseif(ctype_digit($ch)){

$digits++;

}

elseif(!ctype_space($ch)){

$special++;

}

}

echo "

<div class='header'>

<h1>🔍 String Analysis Report</h1>

</div>

<div class='content'>

<div class='cards'>

<div class='card vowel'>

<h2>$vowels</h2>

<p>Vowels</p>

</div>

<div class='card consonant'>

<h2>$consonants</h2>

<p>Consonants</p>

</div>

<div class='card digit'>

<h2>$digits</h2>

<p>Digits</p>

</div>

<div class='card special'>

<h2>$special</h2>

<p>Special Characters</p>

</div>

</div>

<div class='result'>

<h3>Original Title</h3>

<p>$title</p>

</div>

<a href='index.html' class='button'>

Analyze Another String

</a>

</div>

";

}

else{

echo "

<div class='header'>

<h1>Invalid Request</h1>

</div>

<div class='content'>

<h2 style='text-align:center;color:red;'>

Please submit the form first.

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