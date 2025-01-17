<?php
namespace App\Controllers\Courses;
use App\Models\AddCourseModel;
use App\Models\ArchiveCourseModel;
use App\Models\EditCourseModel;
use App\Models\GetCoursesModel;
 


class CoursesCrud {
    public function createCourse($courseTitle, $courseDescription, $courseContent, $categoryId, $teacherId, $tags) {
        $courseModel = new AddCourseModel();

        $courseId = $courseModel->insertCourse($courseTitle, $courseDescription, $courseContent, $categoryId, $teacherId);

        if (!empty($tags)) {
            $courseModel->insertCourseTags($courseId, $tags);
        }

    }

    public function editcourse($idCourse, $courseTitle, $courseDescription, $courseContent, $categoryId, $tags, $teacherId)
    {
        $deleteTagsAndUpdate = new EditCourseModel();
        
        $deletedTags = $deleteTagsAndUpdate->deleteTags($idCourse);

        if($deletedTags) {

            $update = $deleteTagsAndUpdate->updateCourses($idCourse, $courseTitle, $courseDescription, $courseContent, $categoryId);
            if($update) {

                $insertTags = $deleteTagsAndUpdate->insertTags($idCourse, $tags);
            }
        }
    }

    public function getCoursesController(){
        $coursesModal = new GetCoursesModel();
        $courses = $coursesModal->getCourses();
        return $courses;
    }

    public function numberofCourses()
    { 
        $coursesModalnum = new GetCoursesModel();
        $coursesNums = $coursesModalnum->getNumberOfCourses();
        return $coursesNums;
    }

    public function archiveCourseTeacher($course_id , $action){
        $archiveCourse = new ArchiveCourseModel();
        $archiveCourse->archiveTheCourse($course_id,$action);
    }
}

?>