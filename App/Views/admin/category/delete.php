<?php
require_once "../../../../vendor/autoload.php";

use App\Controllers\Category\CategoryCrud;

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCategory']))
    {
        $id = $_POST["idCategory"];
        $delete = new CategoryCrud();
        $delete->deleteCategoryController($id);
    }
?>