<?php

namespace App\database;
require_once "./../services/TagService.php";
use Services\TagService;

class Tag
{
    private TagService $tagService;

    public function __construct()
    {
        $this->tagService = new TagService();

    }


    public  function addTag($nomTag){
        $this->tagService->addTag($nomTag);

    }
    public  function getTags(){
       return $this->tagService->getTags();

    }

    public  function deleteTAg($idTag){
         $this->tagService->deleteTag($idTag);

    }

    public  function update($idTag,$nomtag){
        $this->tagService->updateTag($idTag,$nomtag);

    }

}