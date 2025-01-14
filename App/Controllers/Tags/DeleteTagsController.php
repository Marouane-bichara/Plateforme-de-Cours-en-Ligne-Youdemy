<?php

namespace App\Controllers\Tags;

use App\Models\DeleteTagsModel;

class DeleteTagsController{
    public function deleteTagsController($id)
    {
        $deleteCateModel = new DeleteTagsModel();
        $deleteCateModel->deleteTagsModel($id);
    }
}

?>