<?php
require "../../../../vendor/autoload.php";

use App\Controllers\Courses\CoursesCrud;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["course_id"]) && isset($_POST["action"])) 
        {
             $action = $_POST["action"];
             $course_id = $_POST["course_id"];
             $updateStatu = new CoursesCrud();
             $updateStatu->archiveCourseTeacher($course_id , $action);
        }
    }
?>