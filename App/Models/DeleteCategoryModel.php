<?php

namespace App\Models;

use App\Config\Dbh;

class DeleteCategoryModel{
    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }
    public function deleteCategoryModel($id)
    {
        $query = "DELETE FROM category 
        WHERE category.id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: ./category.php");
        
    }
}

?>