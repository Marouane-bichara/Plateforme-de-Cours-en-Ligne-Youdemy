<?php
namespace App\Controllers\Users;

use App\Models\UpdateUserStatusModel;

class UpdateStatusController{

    public function updateUserStatus($id_user , $status)
    {
        $userUpdate = new UpdateUserStatusModel();
        $userUpdate->updateStatus($id_user , $status);
    }
}

?>