<?php

use App\Controllers\Student\StudentController;
require_once "../../../vendor/autoload.php";


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["course_id"]))
        {
            session_start();
            $course_id = $_POST["course_id"];
            $student_id = $_SESSION["user_idStudent"];

            $enrollStudent = new StudentController();
            $enrollStudent->enrollInCourseStudent($student_id , $course_id);
        }
    }

?>