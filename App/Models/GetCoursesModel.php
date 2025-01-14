<?php
namespace App\Models;
use App\Config\Dbh;
use PDO;

    class GetCoursesModel{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }
       
        public function getcoursesmodal()
        {
            $query = "SELECT * from course";

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