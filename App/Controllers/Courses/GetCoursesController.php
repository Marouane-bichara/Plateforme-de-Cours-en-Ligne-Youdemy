<?php
namespace App\Controllers\Courses;
use App\Models\GetCoursesModel;

    class GetCoursesController{
        public function getCoursesController(){
            $coursesModal = new GetCoursesModel();
            $courses = $coursesModal->getcoursesmodal();
            return $courses;
        }

        public function numberofCourses()
        {
            $coursesModalnum = new GetCoursesModel();
            $coursesNums = $coursesModalnum->getNumberOfCourses();
            return $coursesNums;
        }
    }
?>