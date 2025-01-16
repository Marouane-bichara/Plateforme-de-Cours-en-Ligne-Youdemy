<?php
namespace App\Controllers\Courses;

use App\Models\EditCourseModel;

class EditCourseController {

    public function __construct($courseId, $courseTitle, $courseDescription, $courseContent, $categoryId, $tags, $teacherId) {
        $this->deleteTagsAndUpdate($courseId, $courseTitle, $courseDescription, $courseContent, $categoryId, $tags, $teacherId);
    }

    public function deleteTagsAndUpdate($idCourse, $courseTitle, $courseDescription, $courseContent, $categoryId, $tags, $teacherId)
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
}

?>