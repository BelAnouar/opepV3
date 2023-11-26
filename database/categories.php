
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


function getCategories()
{
    global $conn;
    if ($conn) {
        $sql = "SELECT * FROM categories";
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
function getCategorieByid($id)
{
    global $conn;

    if ($conn) {
        $sql = $conn->prepare("SELECT nomCateforie FROM categories WHERE idCategorie = ?");
        if ($sql) {
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();

            if ($result->num_rows > 0) {

                return $result->fetch_assoc();
            }
        } else {
            echo "SQL prepare error: " . $conn->error;
        }
    }

    return null;
}
