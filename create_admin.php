<?php

include "db.php";

// Administrator details
$username = "admin";
$full_name = "System Administrator";
$email = "admin@oers.com";
$password = password_hash("admin123", PASSWORD_DEFAULT);

// Check if admin already exists
$check = $conn->prepare("SELECT id FROM admins WHERE username=?");
$check->bind_param("s", $username);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {

    echo "<h2>Administrator already exists.</h2>";

} else {

    $stmt = $conn->prepare("
        INSERT INTO admins
        (username, full_name, email, password)
        VALUES (?,?,?,?)
    ");

    $stmt->bind_param(
        "ssss",
        $username,
        $full_name,
        $email,
        $password
    );

    if ($stmt->execute()) {

        echo "<h2>Administrator created successfully!</h2>";

        echo "<hr>";

        echo "<strong>Username:</strong> admin<br>";
        echo "<strong>Password:</strong> admin123";

    } else {

        echo "Error: " . $stmt->error;

    }

    $stmt->close();
}

$check->close();
$conn->close();

?>