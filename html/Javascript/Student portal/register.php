<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link rel="stylesheet" href="style.css">
    <script src="validation.js" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    

<!-- Navigation -->

<nav class="navbar">

    <div class="logo">
        Student Portal
    </div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>

</nav>

<!-- Registration Form -->

<div class="form-container">

    <div class="form-box">

        <h2>Student Registration</h2>

        <?php
        if(isset($_GET['success']))
        {
            echo "<p class='success'>Registration Successful! You can login now.</p>";
        }

        if(isset($_GET['error']))
        {
            echo "<p class='error'>".$_GET['error']."</p>";
        }
        ?>

        <form
        action="register_process.php"
        method="POST"
        onsubmit="return validateForm();">

            <!-- Full Name -->

            <div class="form-group">

                <label>Full Name</label>

                <input
                type="text"
                name="fullname"
                id="fullname">

                <span class="error" id="nameError"></span>

            </div>

            <!-- Age -->

            <div class="form-group">

                <label>Age</label>

                <input
                type="number"
                name="age"
                id="age">

                <span class="error" id="ageError"></span>

            </div>

            <!-- Email -->

            <div class="form-group">

                <label>Email</label>

                <input
                type="text"
                name="email"
                id="email">

                <span class="error" id="emailError"></span>

            </div>

            <!-- Phone -->

            <div class="form-group">

                <label>Phone Number</label>

                <input
                type="text"
                name="phone"
                id="phone">

                <span class="error" id="phoneError"></span>

            </div>

            <!-- Username -->

            <div class="form-group">

                <label>Username</label>

                <input
                type="text"
                name="username"
                id="username">

                <span class="error" id="usernameError"></span>

            </div>

            <!-- Password -->

            <div class="form-group">

                <label>Password</label>

                <input
                type="password"
                name="password"
                id="password">

                <span class="error" id="passwordError"></span>

            </div>

            <!-- Confirm Password -->

            <div class="form-group">

                <label>Confirm Password</label>

                <input
                type="password"
                name="confirmPassword"
                id="confirmPassword">

                <span class="error" id="confirmError"></span>

            </div>

            <!-- Gender -->

            <div class="form-group">

                <label>Gender</label>

                <select
                name="gender"
                id="gender">

                    <option value="">Select Gender</option>

                    <option>Male</option>

                    <option>Female</option>

                    <option>Other</option>

                </select>

                <span class="error" id="genderError"></span>

            </div>

            <!-- Department -->

            <div class="form-group">

                <label>Department</label>

                <select
                name="department"
                id="department">

                    <option value="">Select Department</option>

                    <option>Computer Science</option>

                    <option>Information Technology</option>

                    <option>Artificial Intelligence</option>

                    <option>Data Science</option>

                    <option>Cyber Security</option>

                </select>

                <span class="error" id="departmentError"></span>

            </div>

            <!-- Terms -->

            <div class="form-group">

                <label>

                    <input
                    type="checkbox"
                    id="terms">

                    I agree to the Terms and Conditions

                </label>

                <span class="error" id="termsError"></span>

            </div>

            <!-- Register Button -->

            <button type="submit">

                Register

            </button>

        </form>

        <br>

        <p style="text-align:center;">

            Already have an account?

            <a href="login.php">

                Login

            </a>

        </p>

    </div>

</div>

</body>
</html>