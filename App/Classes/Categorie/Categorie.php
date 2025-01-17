<?php
namespace App\Classes\Categorie;
    class Categorie{
        private $name;
        
        public function __construct($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
    }
?>