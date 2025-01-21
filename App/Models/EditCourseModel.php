<?php
namespace App\Models;

use App\Config\Dbh;
use App\Controllers\AbstractClass\AfficheCourses;

    class EditCourseModel extends AfficheCourses{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }

         public function getCourses(){}

          
        public function deleteTags($id)
        {
            $query = "DELETE FROM tagsandcourse where course_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        }
        public function updateCourses($idCourse, $courseTitle, $courseDescription, $courseContent, $categoryId) {
            $query = "UPDATE course 
                      SET 
                          title = :courseTitle,
                          description = :courseDescription,
                          content = :courseContent,
                          category_id = :categoryId
                      WHERE id = :idCourse"; 
            
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(":courseTitle", $courseTitle);        
            $stmt->bindParam(":courseDescription", $courseDescription); 
            $stmt->bindParam(":courseContent", $courseContent);     
            $stmt->bindParam(":categoryId", $categoryId);          
            $stmt->bindParam(":idCourse", $idCourse);               
            $stmt->execute();
            return true;
        }

        public function insertTags($idCourse , $tags)
        {
            $query = "INSERT INTO tagsandcourse (course_id, tag_id) VALUES (:course_id, :tag_id)";
            $stmt = $this->conn->prepare($query);
    
            foreach ($tags as $tag_id) {
                $stmt->bindParam(":course_id", $idCourse);
                $stmt->bindParam(":tag_id", $tag_id);
                $stmt->execute();
            }
            header("Location:./courses.php");
        }
    }
?>