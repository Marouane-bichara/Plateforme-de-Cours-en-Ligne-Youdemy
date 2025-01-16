<?php
namespace App\Controllers\TeacherCourses;

use App\Models\GetCoursesOfTeacherModel;

    class GetTechaerCoursesController {

         public function getCourses()
        {
            $coursesFetch = new GetCoursesOfTeacherModel();
            $courses = $coursesFetch->getCourses();
            return $courses;
        }

    }

?>