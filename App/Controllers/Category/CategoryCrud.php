<?php
namespace App\Controllers\Category;

use App\Models\AddCategoryModel;
use App\Models\DeleteCategoryModel;
use App\Models\EditeCategoryModel;
use App\Models\GetCategoryModel;


    class CategoryCrud{

        public function addCatergory($name){
            $addAcategory = new AddCategoryModel();
            $addAcategory->addAcategory($name);
        }

        public function deleteCategoryController($id)
        {
            $deleteCateModel = new DeleteCategoryModel();
            $deleteCateModel->deleteCategoryModel($id);
        }

        public function editCategoryController($categoryId, $categoryName) {

            $category = new EditeCategoryModel();
    
    
            $category->updateCategory($categoryId, $categoryName);
        }


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
    }

?>