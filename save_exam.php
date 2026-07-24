<?php

session_start();

include "db.php";


// Protect page

if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {

    header("Location: login.php");
    exit();

}



if ($_SERVER["REQUEST_METHOD"] != "POST") {

    die("Invalid Request.");

}



// Receive data

$unit_code = trim($_POST['unit_code']);
$unit_name = trim($_POST['unit_name']);
$exam_date = $_POST['exam_date'];
$exam_time = $_POST['exam_time'];
$venue = trim($_POST['venue']);



// Validate fields

if (
    empty($unit_code) ||
    empty($unit_name) ||
    empty($exam_date) ||
    empty($exam_time) ||
    empty($venue)
) {

    die("All fields are required.");

}



// Check if unit already exists on same date

$check = $conn->prepare(
    "SELECT id FROM examinations WHERE unit_code=? AND exam_date=?"
);

$check->bind_param(
    "ss",
    $unit_code,
    $exam_date
);

$check->execute();

$result = $check->get_result();


if ($result->num_rows > 0) {

    die("This examination already exists.");

}



// Insert examination

$stmt = $conn->prepare(
"
INSERT INTO examinations
(
unit_code,
unit_name,
exam_date,
exam_time,
venue
)
VALUES
(?,?,?,?,?)
"
);


$stmt->bind_param(
    "sssss",
    $unit_code,
    $unit_name,
    $exam_date,
    $exam_time,
    $venue
);



if ($stmt->execute()) {


    echo "
    <script>
    alert('Examination Added Successfully!');
    window.location='examinations.php';
    </script>
    ";


} else {


    echo "Error: " . $stmt->error;


}



$stmt->close();
$check->close();
$conn->close();


?>