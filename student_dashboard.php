<?php

session_start();


// Protect page

if (!isset($_SESSION['user']) || $_SESSION['role'] != "student") {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Dashboard | OERS</title>

<link rel="stylesheet" href="style.css">

</head>


<body>


<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>


<?php include "menu.php"; ?>


<div class="container">

<div class="login-box">


<h1>
Welcome, <?php echo $_SESSION['user']; ?>
</h1>


<p class="welcome">
Student Dashboard
</p>



<div class="dashboard-links">


<a href="register_exam.php">
Register Examination
</a>


<a href="my_exams.php">
My Exams
</a>


<a href="change_password.php">
Change Password
</a>


<a href="logout.php">
Logout
</a>


</div>



</div>

</div>


</body>

</html>