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
            $numberOfcourses = new GetCoursesOfTeacherModel();
            $theNumber = $numberOfcourses->getNumberOfCourses();
            return $theNumber;
        }
        public function getUsersEnrollWithCourses()
        {
            $fetchCoursesEnrolled = new GetCoursesOfTeacherModel();
            $resault = $fetchCoursesEnrolled->getUsersEnrolled();
            return $resault;
        }

        public function numberOftotalStudentsEnrolled()
        {
            $fetchNumbeTOTAL = new GetCoursesOfTeacherModel();
            $resault = $fetchNumbeTOTAL->totalStudentsEnrolled();
            return $resault;
        }
        public function numberActiveCourses()
        {
            $numberactiveCoursesTeacher = new GetCoursesOfTeacherModel();
            $resault = $numberactiveCoursesTeacher->numberActiveCoursesmodale();
            return $resault;
        }

    }

?>