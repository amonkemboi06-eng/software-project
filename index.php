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
<!-- HERO SECTION -->
<section class="hero">
<h1>
Online Examination Registration System
</h1>
<p>
Welcome to the <strong>Tech University</strong> Online Examination Registration System (OERS). <br>Register your examinations quickly, securely, and conveniently from anywhere.

</p>
<div class="hero-buttons">
<a href="register.php">
<button>
Create Account
</button>
</a>
<a href="login.php">
<button>
Login
</button>
</a>
</div>
</section>
<!-- FEATURES -->
<section class="features">

<h2>

Why Use OERS?

</h2>

<div class="cards">

<div class="card">

<h3>📚 Easy Registration</h3>

<p>

Register your examinations online in just a few minutes.

</p>

</div>

<div class="card">

<h3>🔒 Secure System</h3>

<p>

Your information is protected using secure authentication and password encryption.

</p>

</div>

<div class="card">

<h3>⚡ Fast Processing</h3>

<p>

Receive instant confirmation once your examination registration is submitted.

</p>

</div>

<div class="card">

<h3>🌍 Access Anywhere</h3>

<p>

Use the system from campus, home, or anywhere with internet access.

</p>

</div>

</div>

</section>

<!-- HOW IT WORKS -->

<section class="steps">

<h2>

How It Works

</h2>

<ol>

<li>Create your student account.</li>

<li>Log into the system.</li>

<li>Select the examination(s) you wish to register.</li>

<li>Submit your registration.</li>

<li>Wait for approval by the administrator.</li>

<li>View your registered examinations from your dashboard.</li>

</ol>

</section>

<!-- ABOUT -->

<section class="about">

<h2>

About OERS

</h2>

<p>

The Online Examination Registration System (OERS) is designed to simplify examination registration at the Technical University. Students can register for examinations online while administrators manage examinations, approve registrations, and monitor system activities through a centralized dashboard.

</p>

</section>

<footer>

<p>

© 2026 Online Examination Registration System (OERS)

</p>

<p>

Technical University

</p>

</footer>

<script src="index.js"></script>

</body>

</html>