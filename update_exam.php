<?php
session_start();
include "db.php";

// Allow only admins
if (!isset($_SESSION['user']) || $_SESSION['role'] !== "admin") {
    header("Location: login.php");
    exit();
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}

// Get form data
$id = (int) $_POST['id'];
$unit_code = $_POST['unit_code'];
$unit_name = $_POST['unit_name'];
$exam_date = $_POST['exam_date'];
$exam_time = $_POST['exam_time'];
$venue = $_POST['venue'];

// Update examination
$stmt = $conn->prepare(
    "UPDATE examinations
     SET unit_code = ?,
         unit_name = ?,
         exam_date = ?,
         exam_time = ?,
         venue = ?
     WHERE id = ?"
);

$stmt->bind_param(
    "sssssi",
    $unit_code,
    $unit_name,
    $exam_date,
    $exam_time,
    $venue,
    $id
);

// Execute update
if ($stmt->execute()) {

    header("Location: examinations.php?updated=1");
    exit();

} else {

    echo "Error updating examination: " . $conn->error;
}
?>
