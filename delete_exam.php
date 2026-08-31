<?php
session_start();

include "db.php";

// Allow only admins
if (!isset($_SESSION['user']) || $_SESSION['role'] !== "admin") {
    header("Location: login.php");
    exit();
}

// Check examination ID
if (!isset($_GET['id'])) {
    die("Invalid examination ID.");
}

$id = (int) $_GET['id'];

// Delete examination
$stmt = $conn->prepare("DELETE FROM examinations WHERE id = ?");
$stmt->bind_param("i", $id);

// Execute deletion
if ($stmt->execute()) {

    header("Location: examinations.php?deleted=1");
    exit();

} else {

    die("Error deleting examination: " . $conn->error);
}
?>
