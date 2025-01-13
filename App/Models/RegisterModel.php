<?php 

namespace App\Models;

use App\Config\Dbh;
use PDO;

class RegisterModel {

    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }

    public function registerUser($nomeregister ,$prenomeregister,$emailRegister,$roleRegister,$passwordRegister,$confirmpasswordRegister) {
        if (empty($nomeregister) ||empty($prenomeregister) || empty($emailRegister) || empty($roleRegister) || empty($passwordRegister)|| empty($confirmpasswordRegister)) {
            return "emptyInputs";
        }
        if (!preg_match("/^[a-zA-Z- ]*$/", $nomeregister) || !preg_match("/^[a-zA-Z- ]*$/", $prenomeregister)) {
            return "Invalid Name";
        }
        if (!filter_var($emailRegister, FILTER_VALIDATE_EMAIL)) {
            return "emailnotValid";
        }
        if ($passwordRegister !== $confirmpasswordRegister) {
            return "InvalidRepeatPassword";
        }
        if($passwordRegister < 8)
        {
            return "Passowrd is to short";
        }
        return true;
    }

    public function registerTheUser($nomeregister ,$prenomeregister,$emailRegister,$roleRegister,$passwordRegister) {
        $role = 0;
        if ($roleRegister === "student") {
            $role = 1;
        } elseif ($roleRegister === "teacher") {
            $role = 2;
        }else {
            return "InvalidRole";
        }
        $validation = "active";
        if($roleRegister == "teacher")
        {
            $validation = "suspended";
        }

        $hashedPassword = password_hash($passwordRegister, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (nome, prenome, `email`, `password`,`validation`, role_id)
                  VALUES (:nome, :prenome, :email, :password,:validation,:role_id);";



        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nomeregister);
        $stmt->bindParam(":prenome", $prenomeregister);
        $stmt->bindParam(":email", $emailRegister);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->bindParam(":validation", $validation);
        $stmt->bindParam(":role_id", $role, PDO::PARAM_INT);

        try {
            $stmt->execute();
            return "UserRegisteredSuccessfully";
        } catch (\PDOException $e) {
            return "DatabaseError: " . $e->getMessage();
        }
    }
}

?>