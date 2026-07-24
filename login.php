<?php
session_start();

if(isset($_SESSION['user']) && isset($_SESSION['role'])){

    if($_SESSION['role']=="admin"){
        header("Location: admin_dashboard.php");
    }
    else{
        header("Location: student_dashboard.php");
    }

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | OERS</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<?php include "menu.php"; ?>

<div class="container">

<div class="login-box">

<h1>Online Examination Registration System</h1>

<p class="welcome">Login</p>

<form action="authenticate.php" method="POST">

<div class="input-group">

<label>Username / Registration Number</label>

<input
type="text"
name="username"
required>

</div>

<div class="input-group">

<label>Password</label>

<input
type="password"
name="password"
required>

</div>

<button type="submit">

Login

</button>

</form>

<br>

<p style="text-align:center;">

Don't have an account?

<a href="register.php">

Register Here

</a>

</p>

</div>

</div>

</body>

</html>