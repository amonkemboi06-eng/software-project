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

    die("Invalid Request.");

}


$id = $_GET['id'];


// Update status

$stmt = $conn->prepare(
"UPDATE exam_registrations
SET status='Approved'
WHERE id=?"
);

$stmt->bind_param("i", $id);


if ($stmt->execute()) {

    echo "
    <script>
    alert('Registration Approved Successfully!');
    window.location='registrations.php';
    </script>
    ";

} else {

    echo "Error: " . $stmt->error;

}


$stmt->close();
$conn->close();

?>