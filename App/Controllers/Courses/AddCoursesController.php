<?php
namespace App\Controllers\Courses;
use App\Models\AddCourseModel;

class AddCoursesController {

    public function createCourse($courseTitle, $courseDescription, $courseContent, $categoryId, $teacherId, $tags) {
        $courseModel = new AddCourseModel();

        $courseId = $courseModel->insertCourse($courseTitle, $courseDescription, $courseContent, $categoryId, $teacherId);

        if (!empty($tags)) {
            $courseModel->insertCourseTags($courseId, $tags);
        }

        header("Location: ./home.php");
    }
}

?>