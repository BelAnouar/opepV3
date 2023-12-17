<?php
require_once "./../database/categories.php";

$categorie = new \App\database\Categories();

if (isset($_POST["categorie"])) {
    $nomCategorie = $_POST["categorie"];
    $categorie->addCategory($nomCategorie);

}
?>
