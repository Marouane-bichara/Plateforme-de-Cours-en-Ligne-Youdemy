<?php
namespace App\Models;
use App\Config\Dbh;
use PDO;

    class GetUsersModel{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }
       
        public function getUsersmodal()
        {
            $query = "SELECT users.nome as `name` , users.prenome as familyName , users.email as email, users.validation as `validation` , role.role_name as `role` , users.id as id
             from users
             join `role` on users.role_id = role.id";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $row =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }

        public function getNumberOfUsers()
        {
            $query = "SELECT count(*) FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        
            $result = $stmt->fetchColumn();
        
            return $result;
        }
    }
?>