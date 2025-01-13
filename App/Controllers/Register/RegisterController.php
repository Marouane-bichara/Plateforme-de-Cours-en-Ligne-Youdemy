<?php

namespace App\Controllers\Register;

use App\Models\RegisterModel;

class RegisterController{
    public function Register($nomeregister ,$prenomeregister,$emailRegister,$roleRegister,$passwordRegister,$confirmpasswordRegister)
    {
        $registerModel = new RegisterModel();
        $registerModel->registerUser($nomeregister ,$prenomeregister,$emailRegister,$roleRegister,$passwordRegister,$confirmpasswordRegister);
       

        if($registerModel== True)
        {
            $registerTheuser = new RegisterModel();
            $registerTheuser->registerTheUser($nomeregister ,$prenomeregister,$emailRegister,$roleRegister,$passwordRegister);
        }
        
    }
}
?>