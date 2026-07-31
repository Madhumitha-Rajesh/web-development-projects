<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>College Admission Portal</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}


body{

    background:#f1f5f9;

}


/* Header */

.header{

    background:#003366;
    color:white;
    padding:20px 50px;

    display:flex;
    justify-content:space-between;
    align-items:center;

}


.header h1{

    font-size:28px;

}


.logout{

    background:#dc3545;
    color:white;
    text-decoration:none;

    padding:10px 20px;

    border-radius:5px;

}



/* Navigation */


.navbar{

    background:white;
    padding:15px;

    text-align:center;

    box-shadow:0px 2px 5px gray;

}


.navbar a{

    text-decoration:none;
    color:#003366;

    margin:0 20px;

    font-weight:bold;

}



.navbar a:hover{

    color:#007bff;

}



/* Welcome Section */


.welcome{

    background:#dbeafe;

    padding:40px;

    text-align:center;

}


.welcome h2{

    color:#003366;

    margin-bottom:15px;

}


.welcome p{

    color:#555;

    font-size:18px;

}



/* Cards */


.container{

    width:90%;

    margin:30px auto;

}



.cards{

    display:flex;

    justify-content:space-around;

    flex-wrap:wrap;

}



.card{

    background:white;

    width:280px;

    padding:25px;

    margin:15px;

    text-align:center;

    border-radius:10px;

    box-shadow:0px 0px 10px #aaa;

}



.card h3{

    color:#003366;

    margin-bottom:15px;

}



.card p{

    color:#555;

}



/* Footer */


.footer{

    background:#003366;

    color:white;

    text-align:center;

    padding:15px;

    margin-top:40px;

}



</style>


</head>



<body>



<!-- Header -->


<div class="header">

<h1>
ABC College Admission Portal
</h1>


<a href="logout.php" class="logout">
Logout
</a>



</div>




<!-- Navigation -->

<div class="navbar">

<a href="main.php">
Home
</a>

<a href="#">
Courses
</a>

<a href="#">
Admission
</a>

<a href="#">
Contact
</a>

</div>






<!-- Welcome -->


<div class="welcome">


<h2>
Welcome to ABC College
</h2>


<p>
Your gateway to quality education and a bright future.
</p>


</div>




<div class="container">


<div class="cards">



<div class="card">

<h3>
Student Profile
</h3>

<p>
View your personal information and admission details.
</p>

<br>

<button>
View Profile
</button>



</div>




<div class="card">

<h3>
Admission Status
</h3>

<p>
Check your application progress and updates.
</p>

<br>

<button>
View Profile
</button>



</div>




<div class="card">

<h3>
College Courses
</h3>

<p>
Explore available undergraduate and postgraduate courses.
</p>

<br>

<a href="courses.php">
<button>
View Courses
</button>
</a>


</div>




<div class="card">

<h3>
Important Notices
</h3>

<p>
Latest announcements and admission updates.
</p>

<br>

<button>
View Notices
</button>

</div>



</div>


</div>




<!-- Footer -->


<div class="footer">

<p>
© 2026 ABC College | All Rights Reserved
</p>

<p>
Email: abccollege@gmail.com | Phone: +91 9876543210
</p>


</div>




</body>

</html>
