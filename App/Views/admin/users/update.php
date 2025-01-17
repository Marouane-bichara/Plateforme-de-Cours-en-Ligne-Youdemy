<?php
require "../../../../vendor/autoload.php";
use App\Controllers\Users\UpdateStatusController;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["user_id"]))
        {
             $action = $_POST["action"];
             $user_id = $_POST["user_id"];

             $updateStatu = new UpdateStatusController();
             $updateStatu->updateUserStatus($user_id , $action);
        }
    }
?>