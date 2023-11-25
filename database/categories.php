
<?php

function ajouterCAtegorie($nameCategorie)
{
    global $conn;
    $sql = $conn->prepare("INSERT INTO categories (nomCateforie) VALUES (?)");

    if ($sql) {
        $sql->bind_param("s", $nameCategorie);
        $sql->execute();
        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
