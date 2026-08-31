<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<?php include "menu.php"; ?>

<div class="container">

<div class="login-box">

<h2 style="text-align:center;">Student Registration</h2>

<form action="save_register.php" method="POST">

<div class="input-group">

<label>Registration Number</label>

<input
type="text"
name="reg_no"
placeholder="SCCJ/01569/2024"
required>

</div>

<div class="input-group">

<label>Full Name</label>

<input
type="text"
name="full_name"
required>

</div>

<div class="input-group">

<label>Email Address</label>

<input
type="email"
name="email"
required>

</div>

<div class="input-group">

<label>Phone Number</label>

<input
type="text"
name="phone"
required>

</div>

<div class="input-group">

<label>Course</label>

<select name="course" class="form-select" required>

<option value="">Select Course</option>

<option>Information Technology</option>

<option>Computer Science</option>

<option>Computer Networks</option>

<option>Software Engineering</option>

<option>Business Information Technology</option>

</select>

</div>

<div class="input-group">

<label>Year of Study</label>

<select name="year" class="form-select" required>

<option value="">Select Year</option>

<option>1</option>

<option>2</option>

<option>3</option>

<option>4</option>

</select>

</div>

<div class="input-group">

<label>Gender</label>

<select name="gender" class="form-select" required>

<option value="">Select Gender</option>

<option>Male</option>

<option>Female</option>

</select>

</div>

<div class="input-group">

<label>Password</label>

<input
type="password"
name="password"
required>

</div>

<div class="input-group">

<label>Confirm Password</label>

<input
type="password"
name="confirm_password"
required>

</div>

<button type="submit">

Create Account

</button>

</form>

<br>

<p style="text-align:center;">

Already have an account?

<a href="login.php">

Login Here

</a>

</p>

</div>

</div>

</body>

</html>