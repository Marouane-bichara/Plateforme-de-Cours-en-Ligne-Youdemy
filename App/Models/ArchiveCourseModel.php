<?php
    namespace App\Models;

use App\Config\Dbh;
use PDO;

    class ArchiveCourseModel{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }

        public function archiveTheCourse( $course_id , $action)
        {
            $query = "UPDATE course
            set archive = :action
            where course.id= :course_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
            $stmt->bindParam(":action", $action ,  PDO::PARAM_STR);
            $stmt->execute();

            header("Location:./courses.php");
            
        }

    }
?>