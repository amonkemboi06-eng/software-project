<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Online Exam Registration System</title>

    <link rel="stylesheet" href="style.css">
</head>
        <nav class="navbar">

            <div class="logo">
                OERS
            </div>

            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="examinations.php">Examinations</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="#">Contact</a></li>

            </ul>

        </nav>

<body>
<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>

<div class="container">

    <div class="login-box">

        <h1>Online Exam Registration System</h1>

        <p class="welcome">Welcome Back</p>

        <form action="login.php" method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text"
                       name="username"
                       id="username"
                       placeholder="Enter Username"
                       required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password"
                       name="password"
                       id="password"
                       placeholder="Enter Password"
                       required>
            </div>

            <div class="input-group">
                <label>Login As</label>

                <select name="role" required>

                    <option value="">Select User</option>
                    <option value="student">Student</option>
                    <option value="admin">Administrator</option>

                </select>

            </div>

            <button type="submit" class="btn">
                Login
            </button>

        </form>

        <p class="register">
            Don't have an account?
            <a href="register.html">Register Here</a>
        </p>

    </div>

</div>

<script src="login.js"></script>

</body>
</html>