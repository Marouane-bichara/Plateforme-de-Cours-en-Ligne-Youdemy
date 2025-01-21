<?php

    namespace App\Models;

use App\Config\Dbh;

class AddCategoryModel{

    private $conn;

    public function __construct() {
        $db = new Dbh();    
        $this->conn = $db->connection();    
    }

    public function addAcategory($name)
    {
        $query = "INSERT INTO category (`name`) VALUES (:name);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        header("Location: ./category.php");
    }
    
}
?>