<?php
namespace App\Controllers\Category;

use App\Controllers\AbstractClass\CategoryAbstract;
use App\Models\AddCategoryModel;
use App\Models\DeleteCategoryModel;
use App\Models\GetCategoryModel;


class CategoryController extends CategoryAbstract{

    private $name;

    public function __construct($name = ''){
        $this->name = $name;
    }

    public function addCatergory(){
        $addAcategory = new AddCategoryModel();
        $addAcategory->addAcategory($this->name);
    }
     public function deleteCategoryController($id){}
     public function getCategoriesController(){}
     public function numberofCategories(){}


}

?>