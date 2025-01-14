<?php

namespace App\Models;

use App\Config\Dbh;

class DeleteTagsModel{
    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }
    public function deleteTagsModel($id)
    {
        $query = "DELETE FROM tags 
        WHERE Tags.id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: ./tags.php");
        
    }
}

?>