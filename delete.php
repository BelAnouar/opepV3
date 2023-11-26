<?php

require_once './database/conn.php';
if (!isset($_GET['id'])) {

    header("Location: product.php");
} else {

    $id = $_GET['id'];


    $result = deletePlante($id);

    if ($result) {
        header("Location: product.php");
    } else {
        include '../includes/errormessage.php';
    }
}
