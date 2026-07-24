<?php

session_start();

include "db.php";


// Protect student page

if (!isset($_SESSION['user']) || $_SESSION['role'] != "student") {

    header("Location: login.php");
    exit();

}



// Get available examinations

$query = "
SELECT * 
FROM examinations
ORDER BY exam_date ASC
";

$result = $conn->query($query);


?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register Exam | OERS</title>

<link rel="stylesheet" href="style.css">

</head>


<body>


<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>


<?php include "menu.php"; ?>


<div class="container">


<div class="login-box" style="width:90%;">


<h2 style="text-align:center;">
Available Examinations
</h2>



<table border="1" width="100%" cellpadding="10">


<tr>

<th>Unit Code</th>

<th>Unit Name</th>

<th>Date</th>

<th>Time</th>

<th>Venue</th>

<th>Action</th>

</tr>



<?php while($exam = $result->fetch_assoc()){ ?>


<tr>


<td>
<?php echo $exam['unit_code']; ?>
</td>


<td>
<?php echo $exam['unit_name']; ?>
</td>


<td>
<?php echo $exam['exam_date']; ?>
</td>


<td>
<?php echo $exam['exam_time']; ?>
</td>


<td>
<?php echo $exam['venue']; ?>
</td>


<td>

<form action="save_exam_registration.php" method="POST">

<input 
type="hidden"
name="examination_id"
value="<?php echo $exam['id']; ?>">


<button type="submit">
Register
</button>


</form>

</td>


</tr>


<?php } ?>


</table>


</div>


</div>


</body>

</html>