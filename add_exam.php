<?php

session_start();

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

<title>Add Examination | OERS</title>

<link rel="stylesheet" href="style.css">

</head>


<body>


<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>


<?php include "menu.php"; ?>


<div class="container">

<div class="login-box">


<h2 style="text-align:center;">
Add Examination
</h2>



<form action="save_exam.php" method="POST">


<div class="input-group">

<label>Unit Code</label>

<input 
type="text"
name="unit_code"
placeholder="BIT 3101"
required>

</div>



<div class="input-group">

<label>Unit Name</label>

<input 
type="text"
name="unit_name"
placeholder="Database Systems"
required>

</div>



<div class="input-group">

<label>Exam Date</label>

<input 
type="date"
name="exam_date"
required>

</div>



<div class="input-group">

<label>Exam Time</label>

<input 
type="time"
name="exam_time"
required>

</div>



<div class="input-group">

<label>Venue</label>

<input 
type="text"
name="venue"
placeholder="LT 2"
required>

</div>



<button type="submit">
Add Examination
</button>


</form>


</div>

</div>


</body>

</html>