<?php

require_once "./../database/Plant.php";

$plant = new \App\database\Plant();
if (!isset($_GET['id'])) {

    header("Location: produc.php");
} else {

    $id = $_GET['id'];


    $result = $plant->deletePlante($id);

    if ($result) {
        header("Location: product.php");
    }
}
