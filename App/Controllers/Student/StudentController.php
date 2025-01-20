<?php

namespace App\Controllers\Student;

use App\Models\StudentModel;

class StudentController
{
    public function affichageCourses()
    {
        $coursesFetch = new StudentModel();
        $courses = $coursesFetch->getCourses();
        return $courses;
    }

    public function enrollInCourseStudent($idStudent, $course_id)
    {
        $studentModel = new StudentModel();

        $result = $studentModel->checkUserEnrollment($idStudent, $course_id);

        if (empty($result)) {

            $studentModel->enrollStudentInCourse($idStudent, $course_id);
            $message = "Enrollment successful.";
        } else {

            $message = "Student is already enrolled in this course.";
        }


        header("Location: ./home.php?message=" . urlencode($message));
        exit();
    }

    public function StudentMyAllCourses()
    {
        $fetchAllStudentMyCourse = new StudentModel();
        $resault = $fetchAllStudentMyCourse->StudentMyCourses();
        return  $resault;
    }

    public function cancelEnrollment($idStudent, $course_id)
    {
        $studentCancel = new StudentModel();
        $studentCancel->cancelEnrollmentEtudian($idStudent, $course_id);
    }

    public function getCourseWatch($idCourse)
    {
        $getCourse = new StudentModel();
        $resault = $getCourse->getCourseForWatching($idCourse);
        return $resault;
    }
    public function searchByKeyWord($title)
    {
        $searchforCourse = new StudentModel();
        $resault = $searchforCourse->searchByKeyWordModel($title);
        return $resault;
    }
}
