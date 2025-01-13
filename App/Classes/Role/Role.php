<?php

namespace App\Classes\Role;

class Role {
    public $id;
    private $title;

    
    
    public function __construct($id, $title) {
            $this->id = $id;
            $this->title = $title;
    }

    public function getTitle(){
        return $this->title;
    }
    
}