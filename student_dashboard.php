<?php

session_start();

include "db.php";


// Protect page
if (!isset($_SESSION['user']) || $_SESSION['role'] != "student") {

    header("Location: login.php");
    exit();

}


$student_id = $_SESSION['student_id'];



// Dashboard Statistics

$totalRegistered = $conn->query("
SELECT COUNT(*) AS total
FROM exam_registrations
WHERE student_id='$student_id'
")->fetch_assoc()['total'];



$pending = $conn->query("
SELECT COUNT(*) AS total
FROM exam_registrations
WHERE student_id='$student_id'
AND status='Pending'
")->fetch_assoc()['total'];



$approved = $conn->query("
SELECT COUNT(*) AS total
FROM exam_registrations
WHERE student_id='$student_id'
AND status='Approved'
")->fetch_assoc()['total'];




// Registered Exams

$registeredExams = $conn->query("
SELECT examinations.*, exam_registrations.status
FROM exam_registrations
JOIN examinations
ON exam_registrations.examination_id = examinations.id
WHERE exam_registrations.student_id='$student_id'
");




// Available Exams

$availableExams = $conn->query("
SELECT *
FROM examinations
ORDER BY exam_date ASC
");


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


<div class="login-box" style="width:95%; max-width:1200px;">



<h1 style="text-align:center;">

Welcome,

<?php echo htmlspecialchars($_SESSION['user']); ?>

</h1>



<p class="welcome">

</p>





<!-- Statistics -->


<div class="stats">


<div class="stat-card">

<h2><?php echo $totalRegistered; ?></h2>

<p>Registered Exams</p>

</div>



<div class="stat-card">

<h2><?php echo $pending; ?></h2>

<p>Pending</p>

</div>



<div class="stat-card">

<h2><?php echo $approved; ?></h2>

<p>Approved</p>

</div>


</div>






<!-- Registered Exams -->


<h2 style="margin-top:40px;">

My Registered Examinations

</h2>



<table border="1" width="100%" cellpadding="10">


<tr>

<th>Unit Code</th>

<th>Unit Name</th>

<th>Date</th>

<th>Time</th>

<th>Venue</th>

<th>Status</th>

</tr>



<?php while($exam = $registeredExams->fetch_assoc()){ ?>


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
<?php echo $exam['status']; ?>
</td>


</tr>


<?php } ?>


</table>







<!-- Available Exams -->


<h2 style="margin-top:40px;">

Available Examinations

</h2>

<form method="POST" action="register_exam.php">

<table border="1" width="100%" cellpadding="10">

<tr>
    <th>Unit Code</th>
    <th>Unit Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Venue</th>
    <th>Select</th>
</tr>

<?php while($exam = $availableExams->fetch_assoc()) { ?>

<tr>

    <td><?php echo $exam['unit_code']; ?></td>

    <td><?php echo $exam['unit_name']; ?></td>

    <td><?php echo $exam['exam_date']; ?></td>

    <td><?php echo $exam['exam_time']; ?></td>

    <td><?php echo $exam['venue']; ?></td>

    <td>
        <input type="checkbox"
               name="exam_ids[]"
               value="<?php echo $exam['id']; ?>">
    </td>

</tr>

<?php } ?>

</table>

<br>

<button type="submit">
    Register Selected Exams
</button>

</form>








<!-- Logout -->


<div style="text-align:center; margin-top:40px;">





</div>



</div>

</div>



</body>

</html>