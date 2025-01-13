<?php

    namespace App\Models;
    class LogoutModel{

        public function logout()
        {
            session_start();
            session_unset();
            session_destroy();
            header("Location: ../auth/login.php");
            exit();
        }
    
    }

?>