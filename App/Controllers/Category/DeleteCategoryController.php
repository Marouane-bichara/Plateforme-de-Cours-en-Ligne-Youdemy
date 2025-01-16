<?php

namespace App\Controllers\Category;

use App\Models\DeleteCategoryModel;
use App\Controllers\AbstractClass\CategoryAbstract;


class DeleteCategoryController extends CategoryAbstract{
    public function deleteCategoryController($id)
    {
        $deleteCateModel = new DeleteCategoryModel();
        $deleteCateModel->deleteCategoryModel($id);
    }

    public function getCategoriesController(){}
    public function numberofCategories(){}
    public function addCatergory(){}

}

?>