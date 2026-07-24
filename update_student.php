<?php

session_start();

include "db.php";

// Protect admin page
if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit();
}

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Invalid Request.");
}

// Receive form data
$id = $_POST['id'];
$reg_no = trim($_POST['reg_no']);
$full_name = trim($_POST['full_name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$course = trim($_POST['course']);
$year = trim($_POST['year']);
$gender = trim($_POST['gender']);

// Validate
if (
    empty($reg_no) ||
    empty($full_name) ||
    empty($email) ||
    empty($phone) ||
    empty($course) ||
    empty($year) ||
    empty($gender)
) {
    die("All fields are required.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Check for duplicate registration number
$check = $conn->prepare("SELECT id FROM students WHERE reg_no=? AND id<>?");
$check->bind_param("si", $reg_no, $id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    die("Registration Number already exists.");
}

// Update student
$stmt = $conn->prepare("
UPDATE students
SET
reg_no=?,
full_name=?,
email=?,
phone=?,
course=?,
year_of_study=?,
gender=?
WHERE id=?
");

$stmt->bind_param(
    "sssssssi",
    $reg_no,
    $full_name,
    $email,
    $phone,
    $course,
    $year,
    $gender,
    $id
);

if ($stmt->execute()) {

    echo "
    <script>
    alert('Student updated successfully!');
    window.location='students.php';
    </script>
    ";

} else {

    echo "Error: " . $stmt->error;

}

$stmt->close();
$check->close();
$conn->close();

?>