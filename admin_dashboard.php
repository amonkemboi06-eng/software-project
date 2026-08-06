<?php

session_start();
include "db.php";

// Protect admin page
if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit();
}

// Dashboard statistics
$totalStudents = $conn->query("SELECT COUNT(*) AS total FROM students")->fetch_assoc()['total'];

$totalExams = $conn->query("SELECT COUNT(*) AS total FROM examinations")->fetch_assoc()['total'];

$totalRegistrations = $conn->query("SELECT COUNT(*) AS total FROM exam_registrations")->fetch_assoc()['total'];

$pendingRegistrations = $conn->query("SELECT COUNT(*) AS total FROM exam_registrations WHERE status='Pending'")->fetch_assoc()['total'];

$approvedRegistrations = $conn->query("SELECT COUNT(*) AS total FROM exam_registrations WHERE status='Approved'")->fetch_assoc()['total'];


// Latest Students
$students = $conn->query("
SELECT reg_no, full_name, course
FROM students
ORDER BY id DESC
LIMIT 5
");

// Latest Examinations
$exams = $conn->query("
SELECT unit_code, unit_name, exam_date, venue
FROM examinations
ORDER BY exam_date ASC
LIMIT 5
");

// Latest Registrations
$registrations = $conn->query("
SELECT
students.full_name,
examinations.unit_name,
exam_registrations.status
FROM exam_registrations
JOIN students
ON exam_registrations.student_id = students.id
JOIN examinations
ON exam_registrations.examination_id = examinations.id
ORDER BY exam_registrations.id DESC
LIMIT 5
");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Administrator Dashboard | OERS</title>

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



<div class="stats">

<div class="stat-card">
<h2><?php echo $totalStudents; ?></h2>
<p>Total Students</p>
</div>

<div class="stat-card">
<h2><?php echo $totalExams; ?></h2>
<p>Total Examinations</p>
</div>

<div class="stat-card">
<h2><?php echo $totalRegistrations; ?></h2>
<p>Total Registrations</p>
</div>

<div class="stat-card">
<h2><?php echo $pendingRegistrations; ?></h2>
<p>Pending</p>
</div>

<div class="stat-card">
<h2><?php echo $approvedRegistrations; ?></h2>
<p>Approved</p>
</div>

</div>

<br>

<h2>Recent Students</h2>
<div class="table-responsive">

<table border="1" width="100%" cellpadding="10">

<tr>
<th>Registration No.</th>
<th>Student Name</th>
<th>Course</th>
</tr>

<?php while($student = $students->fetch_assoc()){ ?>

<tr>

<td><?php echo $student['reg_no']; ?></td>

<td><?php echo $student['full_name']; ?></td>

<td><?php echo $student['course']; ?></td>

</tr>

<?php } ?>
<div class="table-responsive">
</table>
</div>
<br>

<h2>Upcoming Examinations</h2>
<div class="table-responsive">
<table border="1" width="100%" cellpadding="10">

<tr>

<th>Unit Code</th>

<th>Unit Name</th>

<th>Date</th>

<th>Venue</th>

</tr>

<?php while($exam = $exams->fetch_assoc()){ ?>

<tr>

<td><?php echo $exam['unit_code']; ?></td>

<td><?php echo $exam['unit_name']; ?></td>

<td><?php echo $exam['exam_date']; ?></td>

<td><?php echo $exam['venue']; ?></td>

</tr>

<?php } ?>
</table>
</div>
<br>

<h2>Latest Registrations</h2>
<div class="table-responsive">
<table border="1" width="100%" cellpadding="10">

<tr>

<th>Student</th>

<th>Unit</th>

<th>Status</th>

</tr>

<?php while($row = $registrations->fetch_assoc()){ ?>

<tr>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['unit_name']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php } ?>

</table>
</div>
</div>
<br>

<div style="text-align:center;">



</div>

</div>

</div>

</body>

</html>