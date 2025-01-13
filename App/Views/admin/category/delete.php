<?php
require_once "../../../../vendor/autoload.php";

use App\Controllers\Category\DeleteCategoryController;

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCategory']))
    {
        $id = $_POST["idCategory"];
        $delete = new DeleteCategoryController();
        $delete->deleteCategoryController($id);
    }
?>