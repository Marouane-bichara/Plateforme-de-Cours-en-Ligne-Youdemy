<?php


namespace App\Models;

use App\Config\Dbh;
use PDO;

class EditTagModel
{
    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection(); 
    }

    public function updateTagById($tagId, $tagName)
    {
        $sql = "UPDATE tags SET name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':name', $tagName);
        $stmt->bindParam(':id', $tagId);

         $stmt->execute();
        header("Location:./tags.php");

    }
}

?>