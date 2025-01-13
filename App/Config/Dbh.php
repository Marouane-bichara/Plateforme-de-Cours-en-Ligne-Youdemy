<?php

namespace App\Config;
require_once __DIR__ ."../../../vendor/autoload.php";
use Dotenv\Dotenv;
use PDO;
use PDOException;

class Dbh{

    private $conn;

    public function connection()
    {
        try {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            $this->conn = new PDO("mysql:host=".$_ENV["HOST"] . ";dbname=".$_ENV["DATABASE"], $_ENV["USER"],$_ENV["PASSWORD"]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exeption) {
            echo "Connection error: " . $exeption->getMessage();
        }
        return $this->conn;
    }
}

$bd = new Dbh();
$bd->connection();

?>