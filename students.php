<?php

session_start();

include "db.php";

// Protect admin page
if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit();
}

// Get students
$query = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($query);

// Count students
$totalStudents = $conn->query("SELECT COUNT(*) AS total FROM students")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students | OERS</title>

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
Registered Students
</h1>

<p class="welcome">
Total Registered Students: <strong><?php echo $totalStudents; ?></strong>
</p>
<div class="table-responsive">

<table>

<tr>

<th>No.</th>

<th>Registration No.</th>

<th>Full Name</th>

<th>Email</th>

<th>Phone</th>

<th>Course</th>

<th>Year</th>

<th>Gender</th>

<th>Edit</th>

<th>Delete</th>

</tr>

<?php

$number = 1;

while($student = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $number++; ?></td>

<td><?php echo htmlspecialchars($student['reg_no']); ?></td>

<td><?php echo htmlspecialchars($student['full_name']); ?></td>

<td><?php echo htmlspecialchars($student['email']); ?></td>

<td><?php echo htmlspecialchars($student['phone']); ?></td>

<td><?php echo htmlspecialchars($student['course']); ?></td>

<td><?php echo htmlspecialchars($student['year_of_study']); ?></td>

<td><?php echo htmlspecialchars($student['gender']); ?></td>

<td>

<a class="btn-edit"
href="edit_student.php?id=<?php echo $student['id']; ?>">

Edit

</a>

</td>

<td>

<a class="btn-delete"
href="delete_student.php?id=<?php echo $student['id']; ?>"
onclick="return confirm('Are you sure you want to delete this student?');">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>
</div>
</div>

</div>

</body>

</html>