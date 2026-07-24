<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination Registration System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<?php include "menu.php"; ?>

<section class="hero">

    <h1>Online Examination Registration </h1>

    <p>
        Register for examinations anytime, anywhere with a secure and easy-to-use online platform.
    </p>

    <div class="hero-buttons">

        <a href="register.php">
            <button>Get Started</button>
        </a>

        <a href="login.php">
            <button>Login</button>
        </a>

    </div>

</section>




<section class="steps">

    <h2>How It Works</h2>

    <ol>

        <li>Create your student account.</li>

        <li>Login to your account.</li>

        <li>Select available examinations.</li>

        <li>Submit your registration.</li>

        <li>Print your examination slip.</li>

    </ol>

</section>

<section class="about">



</section>

<footer>

    <p>

        &copy; 2026 Online Examination Registration System | Tech University

    </p>

</footer>

<script src="index.js"></script>

</body>
</html>