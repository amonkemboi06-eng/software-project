<?php

session_start();


// Protect admin page

if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {

    header("Location: login.php");
    exit();

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard | OERS</title>

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
Admin Dashboard
</p>



<div class="dashboard-links">


<a href="students.php">
Manage Students
</a>


<a href="examinations.php">
Manage Examinations
</a>


<a href="registrations.php">
View Registrations
</a>


<a href="logs.php">
System Logs
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