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

if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM exams WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Examination not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Examination</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<?php include "menu.php"; ?>

<video autoplay muted loop id="bg-video">
<source src="VID1.mp4" type="video/mp4">
</video>

<div class="container">

<div class="login-box">

<h2>Edit Examination</h2>

<form action="update_exam.php" method="POST">

<input type="hidden" name="id"
value="<?php echo $row['id']; ?>">

<div class="input-group">
<label>Course Code</label>
<input type="text" name="course_code"
value="<?php echo htmlspecialchars($row['course_code']); ?>" required>
</div>

<div class="input-group">
<label>Course Name</label>
<input type="text" name="course_name"
value="<?php echo htmlspecialchars($row['course_name']); ?>" required>
</div>

<div class="input-group">
<label>Date</label>
<input type="date" name="exam_date"
value="<?php echo $row['exam_date']; ?>" required>
</div>

<div class="input-group">
<label>Time</label>
<input type="time" name="exam_time"
value="<?php echo $row['exam_time']; ?>" required>
</div>

<div class="input-group">
<label>Venue</label>
<input type="text" name="venue"
value="<?php echo htmlspecialchars($row['venue']); ?>" required>
</div>

<div class="input-group">
<label>Semester</label>
<input type="text" name="semester"
value="<?php echo htmlspecialchars($row['semester']); ?>" required>
</div>

<div class="input-group">
<label>Academic Year</label>
<input type="text" name="academic_year"
value="<?php echo htmlspecialchars($row['academic_year']); ?>" required>
</div>

<div class="input-group">
<label>Status</label>

<select name="status">

<option <?php if($row['status']=="Open") echo "selected"; ?>>
Open
</option>

<option <?php if($row['status']=="Closed") echo "selected"; ?>>
Closed
</option>

</select>

</div>

<button type="submit">

Update Examination

</button>

</form>

</div>

</div>

</body>
</html>