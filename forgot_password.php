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

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Forgot Password | OERS</title>

<link rel="stylesheet" href="style.css">

<style>

.forgot-box {
    width: 100%;
    max-width: 700px;
    margin: 50px auto;
    padding: 40px;
}

.forgot-box h2 {
    text-align: center;
    margin-bottom: 15px;
}

.forgot-box form {
    width: 100%;
}

.forgot-box input {
    width: 100%;
    box-sizing:base_convert;
    margin-bottom: 16px;
}

.forgot-box button {
    width: 100%;
    margin-top: 5px;
}

.message {
    text-align: center;
    color: #dc2626;
    margin-bottom: 15px;
    font-weight: bold;
}

.back-login {
    display: block;
    text-align: center;
    margin-top: 20px;
}

@media (max-width: 600px) {

    .forgot-box {
        width: 90%;
        padding: 25px 18px;
    }

}

</style>

</head>

<body>

<video autoplay muted loop id="bg-video">

    <source src="VID1.mp4" type="video/mp4">

</video>

<div class="container">

    <div class="login-box forgot-box">

        <h2>Forgot Password</h2>

        <?php if ($message != "") { ?>

            <div class="message">
                <?php echo htmlspecialchars($message); ?>
            </div>

        <?php } ?>

        <form method="POST">

            <input
                type="text"
                name="reg_no"
                placeholder="Registration Number"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email Address"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="New Password"
                required
            >

            <input
                type="password"
                name="confirm_password"
                placeholder="Confirm Password"
                required
            >

            <button type="submit">
                Reset Password
            </button>

        </form>

        <a href="login.php" class="back-login">
            Back to Login
        </a>

    </div>

</div>

</body>

</html>