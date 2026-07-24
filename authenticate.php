<?php

session_start();

include "db.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Invalid Request");
}

$username = trim($_POST['username']);
$password = $_POST['password'];


// ================= CHECK ADMIN =================

$stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 1) {

    $admin = $result->fetch_assoc();

    if (password_verify($password, $admin['password'])) {

        $_SESSION['user'] = $admin['username'];
        $_SESSION['role'] = "admin";

        header("Location: admin_dashboard.php");
        exit();

    }
}


// ================= CHECK STUDENT =================

$stmt = $conn->prepare("SELECT * FROM students WHERE reg_no=?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 1) {

    $student = $result->fetch_assoc();

    if (password_verify($password, $student['password'])) {

        $_SESSION['user'] = $student['full_name'];
        $_SESSION['student_id'] = $student['id'];
        $_SESSION['role'] = "student";

        header("Location: student_dashboard.php");
        exit();

    }
}


// ================= FAILED LOGIN =================

echo "
<script>
alert('Invalid Username or Password');
window.location='login.php';
</script>
";

?>