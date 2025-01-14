<?php

    namespace App\Models;

use App\Config\Dbh;

class AddTagsModel{

    private $conn;

    public function __construct() {
        $db = new Dbh();
        $this->conn = $db->connection();    
    }

    public function addTags($name)
    {
        $tagsArray = array_map('trim', explode(',', $name));


        $query = "INSERT INTO tags (`name`) VALUES (:name);";
        $stmt = $this->conn->prepare($query);


        foreach ($tagsArray as $tag) {
            if (!empty($tag)) {
                $stmt->bindParam(":name", $tag);
                $stmt->execute();
            }
        }
        header("Location: ./tags.php");

    }
    
}
?>