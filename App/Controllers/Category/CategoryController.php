<?php
namespace App\Controllers\Category;

use App\Models\AddCategoryModel;

class CategoryController{

    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function addCatergory(){
        $addAcategory = new AddCategoryModel();
        $addAcategory->addAcategory($this->name);
    }
}

?>