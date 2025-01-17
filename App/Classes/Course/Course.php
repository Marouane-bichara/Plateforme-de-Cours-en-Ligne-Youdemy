<?php
namespace App\Classes\Course;
    class Course{
        private $titre;
        private $description;
        private $content;
        private $categorie;
        private $archive;

        public function __construct($titre = '', $description = '', $content = '', $categorie = '', $archive = ''){
            $this->titre = $titre;
            $this->description = $description;
            $this->content = $content;
            $this->categorie = $categorie;
            $this->archive = $archive;
        }
        public function getTitre(){
            return $this->titre;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getContent(){
            return $this->content;
        }
        public function getCategorie(){
            return $this->categorie;
        }
        public function getArchive(){
            return $this->archive;
        }
    }
?>