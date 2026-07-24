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

<div class="login-box" style="width:90%;">

<h1 style="text-align:center;">
Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>
</h1>

<p class="welcome" style="text-align:center;">
Administrator Dashboard
</p>

<hr><br>

<h2>System Statistics</h2>

<table border="1" width="100%" cellpadding="12">

<tr>
    <th>Total Students</th>
    <td><?php echo $totalStudents; ?></td>
</tr>

<tr>
    <th>Total Examinations</th>
    <td><?php echo $totalExams; ?></td>
</tr>

<tr>
    <th>Total Registrations</th>
    <td><?php echo $totalRegistrations; ?></td>
</tr>

<tr>
    <th>Pending Registrations</th>
    <td><?php echo $pendingRegistrations; ?></td>
</tr>

<tr>
    <th>Approved Registrations</th>
    <td><?php echo $approvedRegistrations; ?></td>
</tr>

</table>

<br>

<h2>Quick Links</h2>

<div class="dashboard-links">

<a href="students.php">Manage Students</a>

<a href="examinations.php">Manage Examinations</a>

<a href="add_exam.php">Add Examination</a>

<a href="registrations.php">View Registrations</a>

<a href="logout.php">Logout</a>

</div>

</div>

</div>

</body>

</html>