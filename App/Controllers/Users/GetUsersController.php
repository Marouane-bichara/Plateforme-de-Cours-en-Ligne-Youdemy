<?php
namespace App\Controllers\Users;
use App\Models\GetUsersModel;

    class GetUsersController{
        public function getUsersController(){
            $UsersModal = new GetUsersModel();
            $Users = $UsersModal->getUsersmodal();
            return $Users;
        }

        public function numberofUsers()
        {
            $UsersModalnum = new GetUsersModel();
            $UsersNums = $UsersModalnum->getNumberOfUsers();
            return $UsersNums;
        }
    }
?>