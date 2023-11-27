
<?php
require_once "./database/conn.php";
date_default_timezone_set('Australia/Melbourne');





if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];
    $paniers = getPanierByidUser($idUser);
    var_dump($paniers);
    foreach ($paniers as $panier) {
        $idplant = $panier["plante_id"];
        $userId = $panier["user_id"];
        $date = date('m/d/Y', time());
        $commandes = ajouterCommande($idplant, $userId, $date);
        if ($commandes) {
            echo "addede";
            $delete =  deletePanierByidUser($idUser);
            if ($delete) {
                header("Location: index.php");
            }
        }
    }
}
