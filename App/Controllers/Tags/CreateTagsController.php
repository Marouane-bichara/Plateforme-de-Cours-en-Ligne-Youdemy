<?php
namespace App\Controllers\Tags;

use App\Models\AddTagsModel;

class CreateTagsController{

    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function addCatergory(){
        $addATags = new AddTagsModel();
        $addATags->addTags($this->name);
    }
}

?>