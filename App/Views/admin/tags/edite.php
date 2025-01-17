<?php

use App\Controllers\Tags\TagsCrud;

require_once "../../../../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tagId = $_POST['editTagId']; 
    $tagName = $_POST['editTagName'];

    $editTagController = new TagsCrud();

    $editTagController->editTagController($tagId, $tagName);

}
?>
