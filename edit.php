<?php

require_once "./database/conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modal-update'])) {
    $idPlante =   $_POST['modal-update'];
    $idCategorie = $_POST['modal-categorie'];
    $price = $_POST['modal-price'];
    $nomPlante =  $_POST['modal-name'];
    $orig_file = $_FILES["modal-file"]["tmp_name"];
    $ext = $_FILES["modal-file"]["name"];
    $target_dir = './assets/images/';
    $destination = "$target_dir$ext";
    move_uploaded_file($orig_file, $destination);
    $result = updatePlant($idPlante, $nomPlante, $price, $destination, $idCategorie);
    if ($result) {
        header("Location: product.php");
    }
}
