<?php


namespace App\database;

require_once "./../services/PanierService.php";
require_once "./../database/Commande.php";

use Services\PanierService;
use  App\database\Commande;
class Panier
{
    private PanierService $panierService;

    public function __construct()
    {
        $this->panierService = new PanierService();
        $this->commande=new Commande();
    }

    public  function addToPanier($idPlante, $idUser){
        $this->panierService->ajouterPanier($idPlante, $idUser);
        return true;
    }




    public  function  getPanierByidUser($idUser){

       return $this->panierService->getPanierByidUser($idUser);
    }
    public  function deletePanier($idUser){

        $paniers=$this->getPanierByidUser($idUser);

        foreach ($paniers as $panier) {
            $idplant = $panier["plante_id"];
            $userId = $panier["user_id"];
            $this->commande->addCommade($idplant,$idUser);
        }
        $this->panierService->deletePanierByidUser($idUser);
    }
}