<?php



function ajouterCommande($plant, $iduser, $dateCommande)
{
    global $conn;

    $sql = $conn->prepare("INSERT INTO commande (dateCommande , idPlante , iduser) VALUES (? , ? , ?)");

    if ($sql) {
        $sql->bind_param("sii", $dateCommande, $plant, $iduser);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
