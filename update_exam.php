<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$id=$_POST['id'];

$course_code=$_POST['course_code'];
$course_name=$_POST['course_name'];
$exam_date=$_POST['exam_date'];
$exam_time=$_POST['exam_time'];
$venue=$_POST['venue'];
$semester=$_POST['semester'];
$academic_year=$_POST['academic_year'];
$status=$_POST['status'];

$stmt=$conn->prepare(
"UPDATE exams SET
course_code=?,
course_name=?,
exam_date=?,
exam_time=?,
venue=?,
semester=?,
academic_year=?,
status=?
WHERE id=?"
);

$stmt->bind_param(
"ssssssssi",
$course_code,
$course_name,
$exam_date,
$exam_time,
$venue,
$semester,
$academic_year,
$status,
$id
);

if($stmt->execute()){

$activity="Edited Examination";

$log=$conn->prepare(
"INSERT INTO logs(username,activity,log_date,log_time)
VALUES(?,?,CURDATE(),CURTIME())"
);

$log->bind_param(
"ss",
$_SESSION['user'],
$activity
);

$log->execute();

header("Location: exams.php");

}else{

echo $stmt->error;

}
?>