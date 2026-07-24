<?php

session_start();

include "db.php";


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Invalid Request.");
}


// Receive form data

$reg_no = trim($_POST['reg_no']);
$full_name = trim($_POST['full_name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$course = trim($_POST['course']);
$year = trim($_POST['year']);
$gender = trim($_POST['gender']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];



// Validate empty fields

if (
    empty($reg_no) ||
    empty($full_name) ||
    empty($email) ||
    empty($phone) ||
    empty($course) ||
    empty($year) ||
    empty($gender) ||
    empty($password) ||
    empty($confirm_password)
) {
    die("All fields are required.");
}



// Validate email

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}



// Check password match

if ($password !== $confirm_password) {
    die("Passwords do not match.");
}



// Check duplicate registration number

$check = $conn->prepare(
    "SELECT id FROM students WHERE reg_no=?"
);

$check->bind_param("s", $reg_no);

$check->execute();

$result = $check->get_result();


if ($result->num_rows > 0) {

    die("Registration Number already exists.");

}



// Check duplicate email

$checkEmail = $conn->prepare(
    "SELECT id FROM students WHERE email=?"
);

$checkEmail->bind_param("s", $email);

$checkEmail->execute();

$emailResult = $checkEmail->get_result();


if ($emailResult->num_rows > 0) {

    die("Email already exists.");

}



// Hash password

$hashedPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);



// Insert student

$stmt = $conn->prepare(
"
INSERT INTO students
(
reg_no,
full_name,
email,
phone,
course,
year_of_study,
gender,
password
)
VALUES
(?,?,?,?,?,?,?,?)
"
);


$stmt->bind_param(
    "ssssssss",
    $reg_no,
    $full_name,
    $email,
    $phone,
    $course,
    $year,
    $gender,
    $hashedPassword
);



if ($stmt->execute()) {


    echo "
    <script>
    alert('Registration Successful!');
    window.location='login.php';
    </script>
    ";


} else {


    echo "Registration Failed: " . $stmt->error;


}



// Close connections

$stmt->close();
$check->close();
$checkEmail->close();
$conn->close();


?>