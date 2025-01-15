<?php
  require_once "../../../vendor/autoload.php";

use App\Controllers\Courses\AddCoursesController;

session_start(); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $courseTitle = $_POST['course_title'];
    $courseDescription = $_POST['course_description'];
    $courseContent = $_POST['course_content'];
    $categoryId = $_POST['category_id'];
    $tags = $_POST['tags'];
    $teacherId = $_SESSION['idTeacher']; 


    $courseController = new AddCoursesController();
    $courseController->createCourse($courseTitle, $courseDescription, $courseContent, $categoryId, $teacherId, $tags);
}
?>
