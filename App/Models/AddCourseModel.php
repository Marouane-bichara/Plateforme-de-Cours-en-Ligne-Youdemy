<?php

namespace App\Models;


use App\Config\Dbh;

class AddCourseModel {


    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }


    public function insertCourse($courseTitle, $courseDescription, $courseContent, $categoryId, $teacherId) {
        $query = "INSERT INTO course (title, description, content, category_id,archive ,id_teacher) 
                  VALUES (?, ?, ?, ?,?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$courseTitle, $courseDescription, $courseContent, $categoryId,"active", $teacherId]);

        return $this->conn->lastInsertId(); 
    }


    public function insertCourseTags($courseId, $tags) {
        foreach ($tags as $tagId) {

            $query = "INSERT INTO tagsandcourse (course_id, tag_id) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$courseId, $tagId]);
        }
        header("Location:./home.php");
    }
}