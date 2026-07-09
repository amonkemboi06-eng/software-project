<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Exam Registration System</title>

  <link rel="stylesheet" href="style.css">
</head>
<body>

<video autoplay muted loop id="bg-video">
    <source src="VID1.mp4" type="video/mp4">
</video>
    <!-- Navigation -->

    <header>

        <nav class="navbar">

            <div class="Earth">


              OERS 


            </div>

            <ul class="nav-links">
                <li><a href="examinations.php">Examinations</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="#">Contact</a></li>

            </ul>

        </nav>

    </header>


    <!-- Hero -->

    <section class="hero">

        <h1>Online Exam Registration System</h1>

        <p>
            Register for your examinations quickly and securely.
        </p>

        <button id="registerBtn">
            Register Now
        </button>

    </section>


    <!-- Features -->

    <section class="features">

        <h2>System Features</h2>

        <div class="cards">

            <div class="card">
                <h3>Student Registration</h3>
                <p>Create your account online.</p>
            </div>

            <div class="card">
                <h3>Exam Registration</h3>
                <p>Select available exams.</p>
            </div>

            <div class="card">
                <h3>Exam Timetable</h3>
                <p>View examination schedules.</p>
            </div>

            <div class="card">
                <h3>Registration Status</h3>
                <p>Track your registration.</p>
            </div>

        </div>

    </section>


    <!-- Available Exams -->

    <section class="exam-section">

        <h2>Available Examinations</h2>

        <table>

            <tr>
                <th>Course</th>
                <th>Date</th>
                <th>Venue</th>
            </tr>

            <tr>
                <td>Database Systems</td>
                <td>15 July 2026</td>
                <td>Main Hall</td>
            </tr>

            <tr>
                <td>Networking</td>
                <td>18 July 2026</td>
                <td>Room B12</td>
            </tr>

        </table>

    </section>


    <!-- How It Works -->

    <section class="steps">

        <h2>How It Works</h2>

        <ol>

            <li>Create Student Account</li>
            <li>Login</li>
            <li>Select Examination</li>
            <li>Submit Registration</li>
            <li>Receive Confirmation</li>

        </ol>

    </section>


    <!-- About -->

    <section class="about">

        <h2>About the System</h2>

        <p>
            This platform simplifies examination registration,
            minimizes paperwork and improves communication
            between students and administrators.
        </p>

    </section>


    <!-- Footer -->

    <footer>

        <p>

            &copy; 2026 Online Exam Registration System

        </p>

    </footer>


<script src="index.js"></script>

</body>
</html>