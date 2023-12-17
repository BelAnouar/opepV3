
<?php
require_once "./../database/Panier.php";





$panier=new \App\database\Panier();

if (isset($_GET["user_id"])) {
    $idUser = $_GET["user_id"];
    echo $idUser;
    $paniers = $panier->deletePanier($idUser);


}
