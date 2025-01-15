<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $courseTitle = $_POST['course_title'];
    $courseDescription = $_POST['course_description'];
    $courseContent = $_POST['course_content'];
    $categoryId = $_POST['category_id'];
    $tags = isset($_POST['tags']) ? $_POST['tags'] : [];
}


?>