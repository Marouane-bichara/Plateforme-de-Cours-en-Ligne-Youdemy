<?php
    namespace App\Controllers\Login;

use App\Models\LoginModel;
use App\Classes\Role\Role;
use App\Classes\User\User;

    class LoginController{
        public function login($email,$password){
            $userModel = new LoginModel;
            $user = $userModel->findUserByEmailAndPassword($email,$password);
            if($user == null){
                echo "user not found please check ..."; 
            }
            else{
                if($user->getRole()->getTitle() == "admin")
                {

                    header("Location:../../Views/Admin/home.php");
                }
                if($user->getRole()->getTitle() == "student")
                {

                    header("Location:../../Views/student/home.php");
                }
                if($user->getRole()->getTitle() == "teacher")
                {

                    header("Location:../../Views/teacher/home.php");
                }
            }

        }
    }
?> 