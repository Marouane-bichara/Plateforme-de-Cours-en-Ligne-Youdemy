<?php
namespace App\Controllers\Tags;
use App\Models\GetTagsModel;

    class GetTagsController{
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
    }
?>