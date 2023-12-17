<?php
session_start();
require_once "./../database/Panier.php";
$panier = new \App\database\Panier();

if(isset($_GET["plant_id"])){
    $userID=$_SESSION["user"];
    $plantID=$_GET["plant_id"];
    $panier->addToPanier($plantID,$userID);
}

if(isset($_GET["pannier_id"])){

    $panierID=$_GET["pannier_id"];
    $panier->deletePanier($panierID);
}

