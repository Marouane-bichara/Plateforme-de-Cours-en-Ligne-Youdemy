<?php

    namespace App\Models;

    use App\Config\Dbh;
use PDO;

    class UpdateUserStatusModel{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }


        public function updateStatus($id,$status){
            $query = "UPDATE users 
            SET `validation` = :statu 
            where users.id = :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":statu", $status, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: ./users.php");
        }
    }
?>