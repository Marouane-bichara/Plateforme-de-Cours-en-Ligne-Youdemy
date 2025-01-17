<?php
    namespace App\Controllers\AuthUsers;
    use App\Models\LogoutModel;
    use App\Models\RegisterModel;
    use App\Models\LoginModel;

class AuthUsers{
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
    public function logoutController()
    {
        $logoutModel = new LogoutModel();
        $logoutModel->logout();
    }
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