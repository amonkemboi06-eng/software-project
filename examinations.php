<?php
session_start();

include "db.php";

// Get examinations
$query = "SELECT * FROM examinations ORDER BY exam_date ASC";
$result = $conn->query($query);

// Count examinations
$totalExams = $conn->query("SELECT COUNT(*) AS total FROM examinations")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Examinations | OERS</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<?php include "menu.php"; ?>

<div class="container">

<div class="login-box" style="width:95%; max-width:1300px;">

<h1 style="text-align:center;">
Available Examinations
</h1>

<p class="welcome">
Total Examinations: <strong><?php echo $totalExams; ?></strong>
</p>

<?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){ ?>

<p style="text-align:center; margin-bottom:20px;">

<a class="btn-success" href="add_exam.php">

➕ Add Examination

</a>

</p>

<?php } ?>

<table>

<tr>

<th>No.</th>

<th>Unit Code</th>

<th>Unit Name</th>

<th>Date</th>

<th>Time</th>

<th>Venue</th>

<?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){ ?>

<th>Edit</th>

<th>Delete</th>

<?php } ?>

</tr>

<?php

$number = 1;

while($exam = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $number++; ?></td>

<td><?php echo htmlspecialchars($exam['unit_code']); ?></td>

<td><?php echo htmlspecialchars($exam['unit_name']); ?></td>

<td><?php echo htmlspecialchars($exam['exam_date']); ?></td>

<td><?php echo htmlspecialchars($exam['exam_time']); ?></td>

<td><?php echo htmlspecialchars($exam['venue']); ?></td>

<?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){ ?>

<td>

<a class="btn-edit"
href="edit_exam.php?id=<?php echo $exam['id']; ?>">

Edit

</a>

</td>

<td>

<a class="btn-delete"
href="delete_exam.php?id=<?php echo $exam['id']; ?>"
onclick="return confirm('Delete this examination?');">

Delete

</a>

</td>

<?php } ?>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>

</html>