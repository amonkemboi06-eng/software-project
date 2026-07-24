<?php

session_start();

include "db.php";


// Protect student page

if (!isset($_SESSION['user']) || $_SESSION['role'] != "student") {

    header("Location: login.php");
    exit();

}



if ($_SERVER["REQUEST_METHOD"] != "POST") {

    die("Invalid Request.");

}



// Get data

$student_id = $_SESSION['student_id'];
$examination_id = $_POST['examination_id'];



// Check if already registered

$check = $conn->prepare(
    "SELECT id FROM exam_registrations 
     WHERE student_id=? AND examination_id=?"
);


$check->bind_param(
    "ii",
    $student_id,
    $examination_id
);


$check->execute();


$result = $check->get_result();



if ($result->num_rows > 0) {

    echo "
    <script>
    alert('You already registered for this examination.');
    window.location='register_exam.php';
    </script>
    ";

    exit();

}



// Insert registration

$stmt = $conn->prepare(
"
INSERT INTO exam_registrations
(
student_id,
examination_id,
status
)
VALUES
(?,?,?)
"
);



$status = "Pending";


$stmt->bind_param(
    "iis",
    $student_id,
    $examination_id,
    $status
);



if ($stmt->execute()) {


    echo "
    <script>
    alert('Exam Registration Successful!');
    window.location='my_exams.php';
    </script>
    ";


} else {


    echo "Error: " . $stmt->error;


}



$stmt->close();
$check->close();
$conn->close();


?>