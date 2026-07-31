<?php

session_start();

include "db.php";


if (!isset($_SESSION['user']) || $_SESSION['role'] != "student") {

    header("Location: login.php");
    exit();

}


$student_id = $_SESSION['student_id'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (!isset($_POST['exam_ids'])) {

        echo "
        <script>
        alert('Please select at least one examination');
        window.location='student_dashboard.php';
        </script>";

        exit();

    }



    $exam_ids = $_POST['exam_ids'];



    foreach ($exam_ids as $exam_id) {


        // Prevent duplicate registration

        $check = $conn->query("
        SELECT *
        FROM exam_registrations
        WHERE student_id='$student_id'
        AND examination_id='$exam_id'
        ");



        if ($check->num_rows == 0) {


            $conn->query("
            INSERT INTO exam_registrations
            (student_id, examination_id, status, registered_at)

            VALUES

            ('$student_id',
             '$exam_id',
             'Pending',
             NOW())
            ");


        }


    }



    echo "
    <script>

    alert('Examinations registered successfully');

    window.location='student_dashboard.php';

    </script>";



}



?>