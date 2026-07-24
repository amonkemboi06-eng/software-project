<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if($_SESSION['role']!="admin"){
die("Access Denied");
}

include "db.php";

$id=$_GET['id'];

$stmt=$conn->prepare(
"DELETE FROM exams WHERE id=?"
);

$stmt->bind_param("i",$id);

if($stmt->execute()){

$activity="Deleted Examination";

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