<?php

namespace App\database;

require_once "./../services/CommnadeService.php";


use Services\CommnadeService;

class Commande{
    private CommnadeService $commnadeService;

    public function __construct()
    {
        $this->commnadeService = new CommnadeService();

    }

    public function addCommade($idPalte,$idUser){

         $this->commnadeService->ajouterCommande($idPalte,$idUser);
}
}