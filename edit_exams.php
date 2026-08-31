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

// Get examination details
$stmt = $conn->prepare("SELECT * FROM examinations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

// Check if examination exists
if ($result->num_rows === 0) {
    die("Examination not found.");
}

$exam = $result->fetch_assoc();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Edit Examination | OERS</title>

<link rel="stylesheet" href="style.css">
```

</head>

<body>

<!-- Background Video -->

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<!-- Navigation Menu -->

<?php include "menu.php"; ?>

<div class="container">

```
<div class="login-box">

    <h2>Edit Examination</h2>

    <form action="update_exam.php" method="POST">

        <!-- Examination ID -->
        <input type="hidden" name="id"
            value="<?php echo $exam['id']; ?>">

        <!-- Unit Code -->
        <div class="input-group">
            <label>Unit Code</label>
            <input type="text"
                name="unit_code"
                value="<?php echo htmlspecialchars($exam['unit_code']); ?>"
                required>
        </div>

        <!-- Unit Name -->
        <div class="input-group">
            <label>Unit Name</label>
            <input type="text"
                name="unit_name"
                value="<?php echo htmlspecialchars($exam['unit_name']); ?>"
                required>
        </div>

        <!-- Exam Date -->
        <div class="input-group">
            <label>Exam Date</label>
            <input type="date"
                name="exam_date"
                value="<?php echo $exam['exam_date']; ?>"
                required>
        </div>

        <!-- Exam Time -->
        <div class="input-group">
            <label>Exam Time</label>
            <input type="time"
                name="exam_time"
                value="<?php echo $exam['exam_time']; ?>"
                required>
        </div>

        <!-- Venue -->
        <div class="input-group">
            <label>Venue</label>
            <input type="text"
                name="venue"
                value="<?php echo htmlspecialchars($exam['venue']); ?>"
                required>
        </div>

        <!-- Update Button -->
        <button type="submit">
            Update Examination
        </button>

    </form>

</div>
```

</div>

</body>
</html>
