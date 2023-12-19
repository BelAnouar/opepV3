<?php

namespace App\database;
require_once "./../services/Themetag.php";


use Services\Themetag;
class TagTheme
{


    private Themetag $themetag;

    public function __construct()
    {
        $this->themetag=new Themetag();
    }


    public function getThemeTag(){
        return $this->themetag->getThemeTags();


    }

    public function getTags($themeId){
        return $this->themetag->getTags($themeId);


    }

}