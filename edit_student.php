<?php

session_start();

include "db.php";

// Protect admin page
if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit();
}

// Check ID
if (!isset($_GET['id'])) {
    die("Student not found.");
}

$id = $_GET['id'];

// Get student details
$stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Student not found.");
}

$student = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Student</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<?php include "menu.php"; ?>

<div class="container">

<div class="login-box">

<h2 style="text-align:center;">Edit Student</h2>

<form action="update_student.php" method="POST">

<input type="hidden" name="id" value="<?php echo $student['id']; ?>">

<div class="input-group">
<label>Registration Number</label>
<input type="text" name="reg_no" value="<?php echo htmlspecialchars($student['reg_no']); ?>" required>
</div>

<div class="input-group">
<label>Full Name</label>
<input type="text" name="full_name" value="<?php echo htmlspecialchars($student['full_name']); ?>" required>
</div>

<div class="input-group">
<label>Email</label>
<input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>
</div>

<div class="input-group">
<label>Phone</label>
<input type="text" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>
</div>

<div class="input-group">
<label>Course</label>
<input type="text" name="course" value="<?php echo htmlspecialchars($student['course']); ?>" required>
</div>

<div class="input-group">
<label>Year of Study</label>
<input type="number" name="year" value="<?php echo htmlspecialchars($student['year_of_study']); ?>" min="1" max="4" required>
</div>

<div class="input-group">
<label>Gender</label>

<select name="gender" required>

<option value="Male" <?php if($student['gender']=="Male") echo "selected"; ?>>Male</option>

<option value="Female" <?php if($student['gender']=="Female") echo "selected"; ?>>Female</option>

</select>

</div>

<button type="submit">
Update Student
</button>

</form>

</div>

</div>

</body>

</html>