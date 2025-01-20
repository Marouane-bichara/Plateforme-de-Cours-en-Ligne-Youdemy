<?php
namespace App\Models;
use App\Config\Dbh;

    class NumberOfCoursesTeacher{


        
    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }

    public function getNumberOfCourses()
    { 
        $idteacher = $_SESSION["user_idTeacher"];
        $query = "SELECT count(title) FROM course where teacher_id = $idteacher";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetchColumn();
    
        return $result;
    }
    }

?>