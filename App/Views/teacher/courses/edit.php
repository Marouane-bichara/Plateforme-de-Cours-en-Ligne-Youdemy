<?php

use App\Controllers\Courses\CoursesCrud;

require_once "../../../../vendor/autoload.php";

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["course_id"]) && isset($_POST['course_title']) && isset($_POST['course_description']) 
        && isset($_POST['course_content']) && isset($_POST['category_id']) && isset($_POST['tags'])) {
        
        $courseId = $_POST["course_id"];
        $courseTitle = $_POST['course_title'];
        $courseDescription = $_POST['course_description'];
        $courseContent = $_POST['course_content'];
        $categoryId = $_POST['category_id'];
        $tags = $_POST['tags'];
        $teacherId = $_SESSION['idTeacher'];

        $editthecourse  = new CoursesCrud;
        $editthecourse->editcourse($courseId, $courseTitle, $courseDescription, $courseContent, $categoryId, $tags, $teacherId);

    }
}
?>
