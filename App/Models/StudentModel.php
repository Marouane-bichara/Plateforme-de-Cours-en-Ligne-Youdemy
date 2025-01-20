<?php 

    namespace App\Models;
    use App\Controllers\AbstractClass\AfficheCourses;

    use App\Config\Dbh;
    use PDO;

    class StudentModel extends AfficheCourses{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }
        public function getCourses(){



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
   course.archive = 'active'
    GROUP BY 
        course.id, category.name";

        

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
                
        public function enrollStudentInCourse($idStudent , $course_id)
        {
            $query = "INSERT INTO enrollment (course_id, student_id ,date_registered)
            values(:course_id , :idStudent , CURRENT_DATE)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":idStudent", $idStudent, PDO::PARAM_INT);
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
            $stmt->execute();
            header("Location:./home.php");
        }

        public function checkUserEnrollment($idStudent, $course_id)
        {

            $query = "SELECT enrollment.course_id, enrollment.student_id 
                      FROM enrollment
                      WHERE enrollment.student_id = :idStudent AND enrollment.course_id = :course_id";
        

        $stmt = $this->conn->prepare($query);
        

        $stmt->bindParam(':idStudent', $idStudent, PDO::PARAM_INT);
            $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        

            $stmt->execute();
        

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        

            return $result;
        }
        

        public function StudentMyCourses(){

            $StudentID = $_SESSION["user_idStudent"];
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
    join enrollment on course.id = enrollment.course_id
    WHERE 
   course.archive = 'active' and course.id = enrollment.course_id and enrollment.student_id = :StudentID
    GROUP BY 
        course.id, category.name";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cancelEnrollmentEtudian($idStudent, $course_id)
    {
        $query = "DELETE from enrollment 
        where enrollment.course_id = :course_id and enrollment.student_id = :idStudent";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idStudent", $idStudent, PDO::PARAM_INT);
        $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location:./myCourse.php");
    }

    public function getCourseForWatching($idCourse)
    {   



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
   course.archive = 'active' and course.id = :idCourse
    GROUP BY 
        course.id, category.name";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idCourse", $idCourse, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function searchByKeyWordModel($title)
    {
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
        course.archive = 'active' 
        AND course.title LIKE :title
    GROUP BY 
        course.id, category.name";

        $stmt = $this->conn->prepare($query);
        $formattedTitle = "%" . $title . "%"; 
        $stmt->bindParam(':title', $formattedTitle, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


        public function updateCourses($id, $courseTitle , $courseDescription , $courseContent , $categoryId){}
    }



?>