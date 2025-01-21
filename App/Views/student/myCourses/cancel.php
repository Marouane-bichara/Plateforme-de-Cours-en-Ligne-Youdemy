<?php

use App\Controllers\Student\StudentController;

require_once "../../../../vendor/autoload.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["course_id"]))
        {
            session_start();
            $course_id = $_POST["course_id"];
            $id_student = $_SESSION["user_idStudent"];


            $studentCancelEnrollment = new StudentController();
            $studentCancelEnrollment->cancelEnrollment( $id_student,$course_id);

        }
    }

?>