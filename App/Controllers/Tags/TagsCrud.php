<?php
    namespace App\Controllers\Tags;

    use App\Models\GetTagsModel;
    use App\Models\EditTagModel; 
    use App\Models\DeleteTagsModel;
    use App\Models\AddTagsModel;



    Class TagsCrud{
        public function getTagsController(){
            $TagsModal = new GetTagsModel();
            $Tags = $TagsModal->getTagsmodal();
            return $Tags;
        }

        public function numberofTags()
        {
            $TagsModalnum = new GetTagsModel();
            $TagsNums = $TagsModalnum->getNumberOfTags();
            return $TagsNums;
        }
        public function editTagController($tagId, $tagName)
        {
            $tagModel = new EditTagModel();
    
            return $tagModel->updateTagById($tagId, $tagName);
        }
        public function deleteTagsController($id)
        {
            $deleteCateModel = new DeleteTagsModel();
            $deleteCateModel->deleteTagsModel($id);
        }

        public function addCatergory($name){
            $addATags = new AddTagsModel();
            $addATags->addTags($name);
        }
        
    }

?>