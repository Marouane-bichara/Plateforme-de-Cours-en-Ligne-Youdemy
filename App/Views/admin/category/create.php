<?php
require_once "../../../../vendor/autoload.php";
use App\Controllers\Category\CategoryController;

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCategory'])) 
{
    $categoryName = $_POST["addCategory"];
    $addCategoryy = new CategoryController($categoryName);
    $addCategoryy->addCatergory();
}


?>