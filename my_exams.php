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

$stmt = $conn->prepare(
"
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

ORDER BY examinations.exam_date ASC

"
);


$stmt->bind_param(
    "i",
    $student_id
);


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

</head>


<body>


<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>


<?php include "menu.php"; ?>


<div class="container">


<div class="login-box" style="width:90%;">


<h2 style="text-align:center;">
My Registered Exams
</h2>



<table border="1" width="100%" cellpadding="10">


<tr>

<th>Unit Code</th>

<th>Unit Name</th>

<th>Date</th>

<th>Time</th>

<th>Venue</th>

<th>Status</th>

</tr>



<?php while($exam = $result->fetch_assoc()){ ?>


<tr>


<td>
<?php echo $exam['unit_code']; ?>
</td>


<td>
<?php echo $exam['unit_name']; ?>
</td>


<td>
<?php echo $exam['exam_date']; ?>
</td>


<td>
<?php echo $exam['exam_time']; ?>
</td>


<td>
<?php echo $exam['venue']; ?>
</td>


<td>
<?php echo $exam['status']; ?>
</td>


</tr>


<?php } ?>


</table>


</div>


</div>


</body>

</html>