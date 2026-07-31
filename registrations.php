<?php

session_start();

include "db.php";

// Protect admin page
if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit();
}

// Get registrations
$query = "
SELECT
exam_registrations.id,
students.reg_no,
students.full_name,
examinations.unit_code,
examinations.unit_name,
examinations.exam_date,
examinations.exam_time,
examinations.venue,
exam_registrations.status

FROM exam_registrations

INNER JOIN students
ON exam_registrations.student_id = students.id

INNER JOIN examinations
ON exam_registrations.examination_id = examinations.id

ORDER BY exam_registrations.registered_at DESC
";

$result = $conn->query($query);

// Count registrations
$totalRegistrations = $conn->query("SELECT COUNT(*) AS total FROM exam_registrations")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Exam Registrations | OERS</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<?php include "menu.php"; ?>

<div class="container">

<div class="login-box" style="width:95%; max-width:1400px;">

<h1 style="text-align:center;">
Exam Registrations
</h1>

<p class="welcome">
Total Registrations: <strong><?php echo $totalRegistrations; ?></strong>
</p>

<table>

<tr>

<th>No.</th>

<th>Registration No.</th>

<th>Student Name</th>

<th>Unit Code</th>

<th>Unit Name</th>

<th>Date</th>

<th>Time</th>

<th>Venue</th>

<th>Status</th>

<th>Action</th>

</tr>

<?php

$number = 1;

while($row = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $number++; ?></td>

<td><?php echo htmlspecialchars($row['reg_no']); ?></td>

<td><?php echo htmlspecialchars($row['full_name']); ?></td>

<td><?php echo htmlspecialchars($row['unit_code']); ?></td>

<td><?php echo htmlspecialchars($row['unit_name']); ?></td>

<td><?php echo htmlspecialchars($row['exam_date']); ?></td>

<td><?php echo htmlspecialchars($row['exam_time']); ?></td>

<td><?php echo htmlspecialchars($row['venue']); ?></td>

<td>

<?php if($row['status']=="Approved"){ ?>

<span class="badge badge-approved">

Approved

</span>

<?php } else { ?>

<span class="badge badge-pending">

Pending

</span>

<?php } ?>

</td>

<td>

<?php if($row['status']=="Pending"){ ?>

<a class="btn-success"
href="approve_registration.php?id=<?php echo $row['id']; ?>">

Approve

</a>

<?php } else { ?>

—

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>

</html>