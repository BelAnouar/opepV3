<?php

require_once "./../database/Plant.php";
$plant = new \App\database\Plant();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPlante =   $_POST['modal-update'];
    $idCategorie = $_POST['modal-categorie'];
    $price = $_POST['modal-price'];
    $nomPlante =  $_POST['modal-name'];
    $orig_file = $_FILES["modal-file"]["tmp_name"];
    $ext = $_FILES["modal-file"]["name"];
    $target_dir = __DIR__."/../../../public/assets/images/";
    $destination = "$target_dir$ext";
    $destinationImg="/public/assets/images/".$ext;
    move_uploaded_file($orig_file, $destination);
   $plant->updatePlant($idPlante,$nomPlante,$price,$destinationImg,$idCategorie);

}
