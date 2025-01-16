<?php
namespace App\Controllers\Category;
use App\Models\GetCategoryModel;
use App\Controllers\AbstractClass\CategoryAbstract;



    class GetCategoryController extends CategoryAbstract{
        public function getCategoriesController(){
            $categoryModal = new GetCategoryModel();
            $categories = $categoryModal->getcategoriesmodal();
            return $categories;
        }

        public function numberofCategories()
        {
            $categoryModalnum = new GetCategoryModel();
            $categoriesNums = $categoryModalnum->getNumberOfCategories();
            return $categoriesNums;
        }
         public function addCatergory(){}
         public function deleteCategoryController($id){}
    }
?>