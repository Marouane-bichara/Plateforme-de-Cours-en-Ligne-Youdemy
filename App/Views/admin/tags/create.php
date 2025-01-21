<?php

use App\Controllers\Tags\TagsCrud;

require_once "../../../../vendor/autoload.php";

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addTag'])) 
{
    $TagsName = $_POST["addTag"];
    $addTags = new TagsCrud();
    $addTags->addCatergory($TagsName);
}

 
?>