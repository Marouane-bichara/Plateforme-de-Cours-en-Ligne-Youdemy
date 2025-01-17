<?php
require_once "../../../../vendor/autoload.php";

use App\Controllers\Tags\TagsCrud;

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idTag']))
    {
        $id = $_POST["idTag"];
        $delete = new TagsCrud();
        $delete->deleteTagsController($id);
    }
?>