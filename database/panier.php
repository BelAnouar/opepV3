
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


function getPanierByidUser($idUser)
{
    global $conn;
    $paniers = array();
    $sql = $conn->prepare("SELECT * FROM panier WHERE user_id  = ? ");
    if ($sql) {
        $sql->bind_param("i", $idUser);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $paniers[] = $row;
            }
        }

        return $paniers;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}



function deletePanierByidUser($idUSer)
{
    global $conn;
    $sql = $conn->prepare("DELETE FROM panier WHERE user_id = ?");

    if ($sql) {
        $sql->bind_param("i", $idUSer);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
