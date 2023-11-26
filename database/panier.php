
<?php



function ajouterPanier($idPlante, $idUSer)
{
    global $conn;
    $sql = $conn->prepare("INSERT INTO panier (plante_id,user_id) VALUES (? , ? )");

    if ($sql) {
        $sql->bind_param("ii", $idPlante, $idUSer);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}



function deletePanier($idPanier)
{
    global $conn;
    $sql = $conn->prepare("DELETE FROM panier WHERE idPanier = ?");

    if ($sql) {
        $sql->bind_param("i", $idPanier);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
