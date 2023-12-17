<?php
require_once "./../database/Plant.php";

$plant = new \App\database\Plant();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomPlant = $_POST["Plant"];
    $price = $_POST["price"];
    $categorie = $_POST["categorie"];

    $orig_file = $_FILES["img"]["tmp_name"];
    $ext = $_FILES["img"]["name"];

    $target_dir = __DIR__."./../../../public/assets/images/";
    $destination = "$target_dir$ext";
    $destinationImg="/public/assets/images/".$ext;


    move_uploaded_file($orig_file, $destination);
    $insertPlante = $plant->addPlant($nomPlant, $price, $destinationImg, $categorie);
}
?>
