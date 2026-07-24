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


<div class="login-box" style="width:90%;">


<h2 style="text-align:center;">
Registered Students
</h2>



<table border="1" width="100%" cellpadding="10">


<tr>

<th>ID</th>

<th>Reg No</th>

<th>Full Name</th>

<th>Email</th>

<th>Phone</th>

<th>Course</th>

<th>Year</th>

<th>Gender</th>

<th>Edit</th>

<th>Delete</th>

</tr>



<?php while($student = $result->fetch_assoc()) { ?>


<tr>


<td>
<?php echo $student['id']; ?>
</td>


<td>
<?php echo $student['reg_no']; ?>
</td>


<td>
<?php echo $student['full_name']; ?>
</td>


<td>
<?php echo $student['email']; ?>
</td>


<td>
<?php echo $student['phone']; ?>
</td>


<td>
<?php echo $student['course']; ?>
</td>


<td>
<?php echo $student['year_of_study']; ?>
</td>


<td>
<?php echo htmlspecialchars($student['gender']); ?>
</td>

<td>

<a href="edit_student.php?id=<?php echo $student['id']; ?>">
    <button>Edit</button>
</a>

</td>

<td>

<a href="delete_student.php?id=<?php echo $student['id']; ?>"
onclick="return confirm('Are you sure you want to delete this student?');">

<button>Delete</button>

</a>

</td>


</tr>


<?php } ?>


</table>



</div>


</div>


</body>

</html>