<?php

namespace App\database;

require_once "./../services/PlantService.php";

use Services\PlantService;

class Plant
{
    private PlantService $plantService;

    public function __construct()
    {
        $this->plantService = new PlantService();
    }



    public function addPlant($nomPlante, $price, $image, $idCategorie){
        $this->plantService->addPlant($nomPlante, $price, $image, $idCategorie);
    }
    public function getPlants()
    {
        try {

            return $this->plantService->getPlants();
        } catch (\Exception $e) {

            echo "Error fetching plants: " . $e->getMessage();
        }
    }

    public function getPlantsByUserId($user)
    {
        try {

            return $this->plantService->getPlantsByUserId($user);
        } catch (\Exception $e) {

            echo "Error fetching plants: " . $e->getMessage();
        }
    }



    public function getPlantByCategory($category){


        try {


            return $this->plantService->getPlantByCategory($category);
        } catch (\Exception $e) {
            echo "Error find plants by category: " . $e->getMessage();
        }


    }

    public function getPlantByName($namePlante){



        try {


            return $this->plantService->getPlantByName($namePlante);
        } catch (\Exception $e) {
            echo "Error find plants by name: " . $e->getMessage();
        }



    }

    public  function  updatePlant($idPlante, $nomPlante, $price, $destinationImg, $idCategorie){
        $this->plantService->updatePlant($idPlante, $nomPlante, $price, $destinationImg, $idCategorie);
        return true;
    }


    public  function  deletePlante($id){
       $delete= $this->plantService->deletePlant($id);
       return $delete;
    }

}

