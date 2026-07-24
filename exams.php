<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit();
}

include "db.php";

$result = mysqli_query($conn, "SELECT * FROM exams ORDER BY exam_date ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Examinations</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include "menu.php"; ?>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<div class="dashboard">

<h1>Manage Examinations</h1>

<br>

<a href="add_exam.php">
    <button>Add New Examination</button>
</a>

<br><br>

<table border="1" width="100%">

<tr>
    <th>ID</th>
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Venue</th>
    <th>Semester</th>
    <th>Academic Year</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php

$count = 1;

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $count++; ?></td>

<td><?php echo htmlspecialchars($row['course_code']); ?></td>

<td><?php echo htmlspecialchars($row['course_name']); ?></td>

<td><?php echo htmlspecialchars($row['exam_date']); ?></td>

<td><?php echo htmlspecialchars($row['exam_time']); ?></td>

<td><?php echo htmlspecialchars($row['venue']); ?></td>

<td><?php echo htmlspecialchars($row['semester']); ?></td>

<td><?php echo htmlspecialchars($row['academic_year']); ?></td>

<td><?php echo htmlspecialchars($row['status']); ?></td>

<td>

<a href="edit_exam.php?id=<?php echo $row['id']; ?>">Edit</a>

|

<a href="delete_exam.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this examination?')">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>