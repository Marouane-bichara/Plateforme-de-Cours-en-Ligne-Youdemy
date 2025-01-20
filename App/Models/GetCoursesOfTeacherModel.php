<?php
namespace App\Models;

use App\Config\Dbh;
use PDO;
use App\Controllers\AbstractClass\AfficheCourses;


class GetCoursesOfTeacherModel extends AfficheCourses{
    
    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }

    public function updateCourses($id, $courseTitle , $courseDescription , $courseContent , $categoryId){}


    public function getCourses(){
        $idTeacher = $_SESSION["user_idTeacher"];
        $query = "SELECT 
        course.id AS course_id,
        course.title AS course_title,
        course.description AS course_description,
        course.content AS course_content,
        course.archive AS course_statu,
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
    WHERE 
        course.teacher_id = :idTeacher AND course.archive = 'active' or course.archive = 'suspended'
    GROUP BY 
        course.id, category.name";
    

        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(':idTeacher', $idTeacher, PDO::PARAM_INT);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getUsersEnrolled()
    {
        $idTeacher = $_SESSION['user_idTeacher'];
    
        $query = 'SELECT 
                    users.prenome AS user_name, 
                    users.nome AS second_name, 
                    course.title AS course_title 
                  FROM 
                    enrollment
                  JOIN 
                    users ON enrollment.student_id = users.id
                  JOIN 
                    course ON enrollment.course_id = course.id
                  WHERE 
                    course.teacher_id = :idTeacher';
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idTeacher', $idTeacher, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    



}


?>