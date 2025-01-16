<?php
namespace App\Controllers\AbstractClass;
    abstract class CategoryAbstract{

        abstract public function addCatergory();
        abstract public function deleteCategoryController($id);
        abstract public function getCategoriesController();
        abstract public function numberofCategories();
    }

?>