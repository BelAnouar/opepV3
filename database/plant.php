<?php





function ajouterPlant($nomPlante, $price, $image, $idCategorie)
{
    global $conn;
    $sql = $conn->prepare("INSERT INTO plante (nomPlante,price,image,categirie_id) VALUES (? , ? , ? , ?)");

    if ($sql) {
        $sql->bind_param("sisi", $nomPlante, $price, $image, $idCategorie);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}


function getPlantes()
{
    global $conn;
    if ($conn) {
        $sql = "SELECT * FROM plante";
        $result = $conn->query($sql);

        if ($result) {
            $categories = $result->fetch_all(MYSQLI_ASSOC);
            return  $categories;
        } else {
            echo "SQL query error: " . $conn->error;
        }
    } else {
        echo "Database connection error";
    }
}



function deletePlante($idPlante)
{
    global $conn;
    $sql = $conn->prepare("DELETE FROM plante WHERE idPlante = ?");

    if ($sql) {
        $sql->bind_param("i", $idPlante);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}











function getPlantsByidUser($user_id)
{
    global $conn;

    $plants = array();


    $sql = $conn->prepare("SELECT * FROM plante INNER JOIN panier ON  plante.idPlante = panier.plante_id  WHERE  panier.user_id = ?");
    $sql->bind_param("i", $user_id);
    $sql->execute();

    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $plants[] = $row;
        }
    }

    return $plants;
}




function updatePlant($idPlante, $nomPlante, $price, $image, $idCategorie)
{
    global $conn;
    $sql = $conn->prepare("UPDATE plante SET nomPlante = ?, price = ?, image = ?, categirie_id = ? WHERE idPlante = ?");

    if ($sql) {
        $sql->bind_param("sisii", $nomPlante, $price, $image, $idCategorie, $idPlante);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
