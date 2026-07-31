<?php

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password != $confirm) {

        $message = "Passwords do not match.";

    } else {

        $check = $conn->query("
        SELECT *
        FROM students
        WHERE reg_no='$reg_no'
        AND email='$email'
        ");

        if ($check->num_rows > 0) {

            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $conn->query("
            UPDATE students
            SET password='$hashed'
            WHERE reg_no='$reg_no'
            ");

            echo "<script>

            alert('Password changed successfully.');

            window.location='login.php';

            </script>";

            exit();

        } else {

            $message = "Registration Number or Email is incorrect.";

        }

    }

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Forgot Password</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="login-box" style="max-width:550px; width:90%;">

<h2>Forgot Password</h2>

<?php

if($message!=""){

echo "<p style='color:red;'>$message</p>";

}

?>

<form method="POST">

<input
type="text"
name="reg_no"
placeholder="Registration Number"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="password"
name="password"
placeholder="New Password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

<button type="submit">

Reset Password

</button>

</form>

<br>

<a href="login.php">

Back to Login

</a>

</div>

</div>

</body>

</html>