<?php
require_once "../../../../vendor/autoload.php";
use App\Controllers\Category\CategoryCrud;

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCategory'])) 
{
    $categoryName = $_POST["addCategory"];
    $addCategoryy = new CategoryCrud();
    $addCategoryy->addCatergory($categoryName);
}


?>