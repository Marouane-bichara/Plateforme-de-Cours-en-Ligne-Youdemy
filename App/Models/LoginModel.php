<?php

namespace App\Models;

use App\Classes\Role\Role;
use App\Classes\User\User;
use App\Config\Dbh;
use PDO;

class LoginModel{
    private $conn; 

    public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();
    }

    public function findUserByEmailAndPassword($email, $password) {
        session_start();
    
        $query = "SELECT 
                    users.id as user_id, 
                    users.nome, 
                    users.prenome, 
                    users.email, 
                    users.validation as `validation`, 
                    users.password, 
                    role.role_name AS role, 
                    role.id AS role_id
                  FROM 
                    users 
                  JOIN 
                    role 
                  ON 
                    role.id = users.role_id 
                  WHERE 
                    users.email = :email";
    
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
     
        if (!password_verify($password, $row['password'])) {
            return null;
        } else {
            if ($row["role"] == "student") {
                $_SESSION["nameStudent"] = $row["role"];
                $_SESSION["idStudent"] = $row["role_id"];
                $_SESSION["validationStudent"] = $row["validation"];
                $_SESSION["user_idStudent"] = $row["user_id"];
            }
            if ($row["role"] == "teacher") {
              $_SESSION["nameTeacher"] = $row["role"];
              $_SESSION["idTeacher"] = $row["role_id"];
              $_SESSION["validationTeacher"] = $row["validation"];
              $_SESSION["user_idTeacher"] = $row["user_id"];
          }
            if ($row["role"] == "admin") {
                $_SESSION["nameAdmin"] = $row["role"];
                $_SESSION["idAdmin"] = $row["role_id"];
                $_SESSION["user_idAdmin"] = $row["user_id"];
            }
    
            $role = new Role($row["role_id"], $row["role"]);
            return new User($row['id'], $row["email"], $role, $row["password"]);
        }
    }
    
}