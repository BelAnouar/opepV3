<?php

namespace App\database;
require_once "./../services/ThemeService.php";
require_once "./../services/Themetag.php";
use Services\ThemeService;
use Services\Themetag;

class Theme
{

    private ThemeService $themeService;
    private Themetag $themetag;

    public function __construct()
    {
        $this->themeService = new ThemeService();
        $this->themetag=new Themetag();
    }

    public function  addTheme($Nom,$description,$arrayTag){
       $lastId= $this->themeService->addTheme($Nom,$description);

       foreach ($arrayTag as $tag){
         $this->themetag->addThemeTag($lastId,$tag);
        }

    }


    public function getTheme(){
      return  $this->themeService->getThemes();
    }
    public function deleteTheme($idThem){
        return  $this->themeService->deleteTheme($idThem);
    }


}