
<?php
require_once "./database/conn.php";






if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];
    $paniers = getPanierByidUser($idUser);
    // var_dump($paniers);
    foreach ($paniers as $panier) {
        $idplant = $panier["plante_id"];
        $userId = $panier["user_id"];

        $commandes = ajouterCommande($idplant, $userId);
        if ($commandes) {
            echo "addede";
            $delete =  deletePanierByidUser($idUser);
            if ($delete) {
                header("Location: index.php");
            }
        }
    }
}
