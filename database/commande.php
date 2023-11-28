<?php



function ajouterCommande($plant, $iduser)
{
    global $conn;

    $sql = $conn->prepare("INSERT INTO commande (idPlante , iduser ) VALUES ( ? , ?  )");

    if ($sql) {
        $sql->bind_param("ii", $plant, $iduser);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
