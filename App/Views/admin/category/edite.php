<?php

use App\Controllers\Category\CategoryCrud;

require_once "../../../../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryId = $_POST['idCategory']; 
    $categoryName = $_POST['editCategory']; 

    $editCategoryController = new CategoryCrud();
    $editCategoryController->editCategoryController($categoryId, $categoryName);


}

?>
