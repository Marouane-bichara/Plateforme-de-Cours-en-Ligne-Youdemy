<?php
require_once "../../../../vendor/autoload.php";

use App\Controllers\Tags\DeleteTagsController;

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idTag']))
    {
        $id = $_POST["idTag"];
        $delete = new DeleteTagsController();
        $delete->deleteTagsController($id);
    }
?>