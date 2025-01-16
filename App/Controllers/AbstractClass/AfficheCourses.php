<?php
namespace App\Controllers\AbstractClass;
    abstract class AfficheCourses{

        abstract public function getCourses();
        abstract public function updateCourses($id, $courseTitle , $courseDescription , $courseContent , $categoryId);
    }

?>