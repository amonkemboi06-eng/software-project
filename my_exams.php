<?php

session_start();

include "db.php";

// Protect student page
if (!isset($_SESSION['user']) || $_SESSION['role'] != "student") {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Get student's registered exams
$stmt = $conn->prepare("
    SELECT 
        examinations.unit_code,
        examinations.unit_name,
        examinations.exam_date,
        examinations.exam_time,
        examinations.venue,
        exam_registrations.status
    FROM exam_registrations
    INNER JOIN examinations
        ON exam_registrations.examination_id = examinations.id
    WHERE exam_registrations.student_id = ?
    ORDER BY examinations.exam_date ASC, examinations.exam_time ASC
");

$stmt->bind_param("i", $student_id);
$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Exams | OERS</title>

<link rel="stylesheet" href="style.css">

<style>

.exams-box {
    width: 95%;
    max-width: 1100px;
    margin: 40px auto;
    padding: 25px;
}

.exams-box h2 {
    text-align: center;
    margin-bottom: 25px;
}

.exam-table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    overflow: hidden;
}

.exam-table th {
    background: #1e3a8a;
    color: white;
    padding: 14px 10px;
    text-align: left;
}

.exam-table td {
    padding: 13px 10px;
    border-bottom: 1px solid #ddd;
    color: #222;
}

.exam-table tr:last-child td {
    border-bottom: none;
}

.exam-table tr:hover {
    background: #f3f6ff;
}

.status {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: bold;
}

.status-approved {
    background: #d1fae5;
    color: #065f46;
}

.status-pending {
    background: #fef3c7;
    color: #92400e;
}

.no-exams {
    text-align: center;
    padding: 30px;
    font-size: 16px;
    color: #555;
}

/* Mobile responsiveness */
@media (max-width: 768px) {

    .exams-box {
        width: 95%;
        padding: 15px;
    }

    .exam-table {
        font-size: 13px;
    }

    .exam-table th,
    .exam-table td {
        padding: 9px 6px;
    }

}

@media (max-width: 600px) {

    .exam-table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

}

</style>

</head>

<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<?php include "menu.php"; ?>

<div class="container">

    <div class="login-box exams-box">

        <h2>My Registered Exams</h2>

        <?php if ($result->num_rows > 0) { ?>

        <table class="exam-table">

            <thead>

                <tr>
                    <th>Unit Code</th>
                    <th>Unit Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

            <?php while ($exam = $result->fetch_assoc()) { ?>

                <tr>

                    <td>
                        <?php echo htmlspecialchars($exam['unit_code']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($exam['unit_name']); ?>
                    </td>

                    <td>
                        <?php echo date("d M Y", strtotime($exam['exam_date'])); ?>
                    </td>

                    <td>
                        <?php echo date("h:i A", strtotime($exam['exam_time'])); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($exam['venue']); ?>
                    </td>

                    <td>

                        <?php if (strtolower($exam['status']) == "approved") { ?>

                            <span class="status status-approved">
                                Approved
                            </span>

                        <?php } else { ?>

                            <span class="status status-pending">
                                Pending
                            </span>

                        <?php } ?>

                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

        <?php } else { ?>

            <div class="no-exams">
                You have not registered for any examinations yet.
            </div>

        <?php } ?>

    </div>

</div>

</body>

</html>