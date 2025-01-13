<?php

namespace App\Controllers\Category;

use App\Models\DeleteCategoryModel;

class DeleteCategoryController{
    public function deleteCategoryController($id)
    {
        $deleteCateModel = new DeleteCategoryModel();
        $deleteCateModel->deleteCategoryModel($id);
    }
}

?>