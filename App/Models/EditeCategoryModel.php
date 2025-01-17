<?php
namespace App\Models;

use App\Config\Dbh;
use PDO;


class EditeCategoryModel{

    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }
   

    public function updateCategory($categoryId, $categoryName) {
        $query = "UPDATE category SET name = :name WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $categoryName, PDO::PARAM_STR);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);

        $stmt->execute();
        header("Location:./category.php");

    }

}

?>