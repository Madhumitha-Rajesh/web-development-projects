<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>

    <link rel="stylesheet" href="style.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Navigation Bar -->

    <nav class="navbar">

        <div class="logo">
            Student Portal
        </div>

        <ul class="nav-links">

            <li><a href="#">Home</a></li>

            <li><a href="#about">About</a></li>

            <li><a href="#features">Features</a></li>

            <li><a href="register.php">Register</a></li>

            <li><a href="login.php">Login</a></li>

        </ul>

    </nav>


    <!-- Hero Section -->

    <section class="hero">

        <div class="hero-content">

            <h1>Welcome to Student Portal</h1>

            <p>
                A simple and secure portal where students can register,
                login and manage their account with ease.
            </p>

            <div class="buttons">

                <a href="register.php" class="btn">Register</a>

                <a href="login.php" class="btn btn-outline">Login</a>

            </div>

        </div>

    </section>


    <!-- About -->

    <section id="about" class="about">

        <h2>About Our Website</h2>

        <p>
            This Student Portal is developed using
            HTML, CSS, JavaScript, PHP and MySQL.

            It demonstrates user registration,
            secure login authentication,
            client-side validation,
            server-side processing,
            and session management.
        </p>

    </section>


    <!-- Features -->

    <section id="features" class="features">

        <h2>Website Features</h2>

        <div class="feature-container">

            <div class="card">

                <h3>Easy Registration</h3>

                <p>
                    Register with complete validation
                    using JavaScript.
                </p>

            </div>

            <div class="card">

                <h3>Secure Login</h3>

                <p>
                    Login securely using PHP
                    authentication.
                </p>

            </div>

            <div class="card">

                <h3>Dashboard</h3>

                <p>
                    Access your personal dashboard
                    after successful login.
                </p>

            </div>

            <div class="card">

                <h3>Responsive Design</h3>

                <p>
                    Fully responsive website
                    compatible with mobiles,
                    tablets and desktops.
                </p>

            </div>

        </div>

    </section>


    <!-- Call To Action -->

    <section class="cta">

        <h2>Ready to Get Started?</h2>

        <p>Create your account today.</p>

        <a href="register.php" class="btn">
            Register Now
        </a>

    </section>


    <!-- Footer -->

    <footer>

        <p>

            © <?php echo date("Y"); ?>

            Student Portal

            | Designed using HTML, CSS, JavaScript & PHP

        </p>

    </footer>

</body>
</html>