<?php
namespace App\Models;
use App\Config\Dbh;
use App\Controllers\AbstractClass\AfficheCourses;
use PDO;

    class GetCoursesModel extends AfficheCourses{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }
        public function updateCourses($id, $courseTitle , $courseDescription , $courseContent , $categoryId){}
        public function getCourses()
        {
            $query = "SELECT 
    course.id AS course_id,
    course.title AS course_title,
    course.description AS course_description,
    course.content AS course_content,
    course.archive AS validation_course,
    category.name AS category_name,
    GROUP_CONCAT(tags.name) AS tags
FROM 
    course
JOIN 
    category ON course.category_id = category.id
LEFT JOIN 
    tagsandcourse ON course.id = tagsandcourse.course_id
LEFT JOIN 
    tags ON tagsandcourse.tag_id = tags.id
GROUP BY 
    course.id, category.name;";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $row =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }

        public function getNumberOfCourses()
        {
            $query = "SELECT count(title) FROM course";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        
            $result = $stmt->fetchColumn();
        
            return $result;
        }
    }
?>