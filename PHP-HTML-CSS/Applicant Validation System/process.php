<?php

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$mobile = trim($_POST["mobile"] ?? "");

$errors = [];


/* Email Validation */

if (empty($email)) {

    $errors[] = "Email ID is required.";

}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errors[] = "Please enter a valid email ID.";

}


/* Password Validation */

if (empty($password)) {

    $errors[] = "Password is required.";

}
elseif (strlen($password) < 6) {

    $errors[] = "Password must contain at least 6 characters.";

}


/* Mobile Validation */

if (empty($mobile)) {

    $errors[] = "Mobile number is required.";

}
elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {

    $errors[] = "Mobile number must contain exactly 10 digits.";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Validation Result</title>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'DM Sans',sans-serif;
}


body{

    min-height:100vh;

    background:#f8fafc;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}


.result-page{

    width:850px;

    max-width:100%;

    background:white;

    border-radius:30px;

    overflow:hidden;

    box-shadow:0 25px 60px rgba(23,32,51,.12);

}


/* Top Section */

.result-header{

    padding:40px;

    text-align:center;

}


.result-icon{

    width:90px;

    height:90px;

    border-radius:25px;

    display:flex;

    align-items:center;

    justify-content:center;

    margin:0 auto 20px;

    font-size:45px;

}


.success-header{

    background:#d1fae5;

}


.error-header{

    background:#fce7f3;

}


.result-header h1{

    color:#172033;

    font-size:32px;

}


.result-header p{

    margin-top:8px;

    color:#64748b;

}


/* Content */

.result-content{

    padding:35px 45px 45px;

}


/* Success Box */

.success-message{

    background:#d1fae5;

    border-left:6px solid #10b981;

    padding:20px;

    border-radius:15px;

    color:#065f46;

    font-weight:600;

    text-align:center;

    margin-bottom:25px;

}


/* Error Box */

.error-message{

    background:#fce7f3;

    border-left:6px solid #f472b6;

    padding:20px;

    border-radius:15px;

    color:#9d174d;

    margin-bottom:25px;

}


.error-message h3{

    margin-bottom:12px;

}


.error-message ul{

    padding-left:22px;

}


.error-message li{

    margin:8px 0;

}


/* Details */

.details{

    background:#f0fdfa;

    border-radius:20px;

    padding:25px;

}


.details h2{

    color:#0e7490;

    margin-bottom:18px;

    font-size:21px;

}


.detail-row{

    display:flex;

    justify-content:space-between;

    gap:20px;

    padding:13px 0;

    border-bottom:1px solid #ccfbf1;

}


.detail-row:last-child{

    border-bottom:none;

}


.detail-row span:first-child{

    color:#64748b;

    font-weight:600;

}


.detail-row span:last-child{

    color:#172033;

    word-break:break-word;

}


/* Status */

.status{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:10px;

    margin-top:20px;

    padding:15px;

    background:#e0e7ff;

    border-radius:15px;

    color:#3730a3;

    font-weight:600;

}


/* Button */

.button{

    display:block;

    width:240px;

    margin:30px auto 0;

    padding:15px;

    text-align:center;

    text-decoration:none;

    border-radius:15px;

    background:#6366a8;

    color:white;

    font-weight:700;

    transition:.25s;

}


.button:hover{

    background:#4f518f;

    transform:translateY(-2px);

}


@media(max-width:600px){

    .result-content{

        padding:25px;

    }


    .result-header{

        padding:30px 20px;

    }


    .result-header h1{

        font-size:26px;

    }


    .detail-row{

        flex-direction:column;

        gap:5px;

    }

}

</style>

</head>


<body>


<div class="result-page">


<?php if (empty($errors)): ?>


    <!-- SUCCESS -->

    <div class="result-header">


        <div class="result-icon success-header">

            ✓

        </div>


        <h1>

            Application Verified

        </h1>


        <p>

            All the submitted information passed validation.

        </p>


    </div>


    <div class="result-content">


        <div class="success-message">

            🎉 Applicant details are valid and ready for submission.

        </div>


        <div class="details">


            <h2>

                Verified Information

            </h2>


            <div class="detail-row">

                <span>Email ID</span>

                <span>

                    <?php echo htmlspecialchars($email); ?>

                </span>

            </div>


            <div class="detail-row">

                <span>Mobile Number</span>

                <span>

                    <?php echo htmlspecialchars($mobile); ?>

                </span>

            </div>


            <div class="detail-row">

                <span>Password</span>

                <span>

                    ✓ Valid

                </span>

            </div>


        </div>


        <div class="status">

            🛡️ Validation Status: Successful

        </div>


        <a href="index.html" class="button">

            Validate Another

        </a>


    </div>


<?php else: ?>


    <!-- VALIDATION FAILED -->

    <div class="result-header">


        <div class="result-icon error-header">

            !

        </div>


        <h1>

            Validation Required

        </h1>


        <p>

            Please correct the following information.

        </p>


    </div>


    <div class="result-content">


        <div class="error-message">


            <h3>

                ⚠ Please check these fields

            </h3>


            <ul>


                <?php foreach ($errors as $error): ?>

                    <li>

                        <?php echo htmlspecialchars($error); ?>

                    </li>

                <?php endforeach; ?>


            </ul>


        </div>


        <a href="index.html" class="button">

            ← Correct Details

        </a>


    </div>


<?php endif; ?>


</div>


</body>

</html>