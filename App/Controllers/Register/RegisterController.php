<?php

namespace App\Controllers\Register;

use App\Models\RegisterModel;

class RegisterController{
    public function Register($nameRegister , $emailRegister , $passwordRegister , $confirmpasswordRegister , $roleRegister)
    {
        $registerModel = new RegisterModel();
        $registerModel->registerUser($nameRegister,$emailRegister,$passwordRegister,$confirmpasswordRegister , $roleRegister);
       

        if($registerModel== True)
        {
            $registerTheuser = new RegisterModel();
            $registerTheuser->registerTheUser($nameRegister,$emailRegister,$passwordRegister,$roleRegister);
        }
        
    }
}
?>