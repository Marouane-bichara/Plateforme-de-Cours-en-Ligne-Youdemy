<?php
namespace App\Models;
use App\Config\Dbh;
use PDO;

    class GetTagsModel{

        private $conn;

        public function __construct() {
            $db = new Dbh();
            $this->conn = $db->connection();    
        }
       
        public function getTagsmodal()
        {
            $query = "SELECT * from tags";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $row =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }

        public function getNumberOfTags()
        {
            $query = "SELECT count(*) FROM tags";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        
            $result = $stmt->fetchColumn();
        
            return $result;
        }
    }
?>