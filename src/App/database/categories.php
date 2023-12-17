<?php

namespace App\database;

require_once "./../services/CategoryService.php";

use Services\CategoryService;



class Categories
{
    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }



    public function getCategorie()
    {
        try {

            return $this->categoryService->getCategories();
        } catch (\Exception $e) {

            echo "Error fetching plants: " . $e->getMessage();
        }
    }


    public  function addCategory($category){
        $this->categoryService->ajouterCategorie($category);
    }

    public function getCategorieByid($idCat){


        $categories=$this->getCategorie();
        $filterCat=array_filter($categories,fn($cat)=>$cat["idCategorie"]==$idCat);
        return $filterCat;
    }

    public function updateCategory($id,$nom){
        $this->categoryService->updateCategory($id,$nom);
    }
}

