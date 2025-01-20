<?php
namespace App\Controllers\TeacherCourses;

use App\Models\GetCoursesOfTeacherModel;
use App\Models\NumberOfCoursesTeacher;

    class GetTechaerCoursesController {

         public function getCourses()
        {
            $coursesFetch = new GetCoursesOfTeacherModel();
            $courses = $coursesFetch->getCourses();
            return $courses;
        }

        public function getNumberOFcourses()
        {
            $numberOfcourses = new NumberOfCoursesTeacher();
            $theNumber = $numberOfcourses->getNumberOfCourses();
            return $theNumber;
        }
        public function getUsersEnrollWithCourses()
        {
            $fetchCoursesEnrolled = new GetCoursesOfTeacherModel();
            $resault = $fetchCoursesEnrolled->getUsersEnrolled();
            return $resault;
        }

    }

?>