<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>

    <nav class="navbar">

        <div class="logo">
            <a href="home.php">OERS</a>
        </div>

        <ul class="nav-links">

            <?php if (!isset($_SESSION['user'])): ?>

                <!-- Guest Menu -->
                <li><a href="home.php">Home</a></li>
                <li><a href="examinations.php">Examinations</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contact.php">Contact</a></li>


            <?php elseif ($_SESSION['role'] === "student"): ?>

                <!-- Student Menu -->
                <li><a href="student_dashboard.php">Dashboard</a></li>
                <li><a href="register_exam.php">Register Exam</a></li>
                <li><a href="my_exams.php">My Exams</a></li>
                <li><a href="#">Change Password</a></li> 
                <li><a href="logout.php">Logout</a></li>


            <?php elseif ($_SESSION['role'] === "admin"): ?>

              <!-- Admin Menu -->
<li><a href="admin_dashboard.php">Dashboard</a></li>
<li><a href="students.php">Students</a></li>
<li><a href="examinations.php">Examinations</a></li>
<li><a href="add_exam.php">Add Exam</a></li>
<li><a href="registrations.php">Registrations</a></li>
<li><a href="logout.php">Logout</a></li>
            <?php endif; ?>

        </ul>

    </nav>

</header>