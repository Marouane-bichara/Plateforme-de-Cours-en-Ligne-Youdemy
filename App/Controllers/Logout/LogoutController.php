<?php
namespace App\Controllers\Logout;
use App\Models\LogoutModel;

    class LogoutController
    {
        public function logoutController()
        {
            $logoutModel = new LogoutModel();
            $logoutModel->logout();
        }
    }
?>