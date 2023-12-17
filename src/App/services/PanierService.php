<?php

namespace Services;
require_once "./../../Framework/Datebase.php";
use Framework\Database;

class PanierService
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function ajouterPanier($idPlante, $idUser)
    {
        $sql = "INSERT INTO panier (plante_id, user_id) VALUES (?, ?)";
        $params = [$idPlante, $idUser];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error adding to cart: " . $e->getMessage());
        }
    }

    public function deletePanier($idPanier)
    {
        $sql = "DELETE FROM panier WHERE idPanier = ?";
        $params = [$idPanier];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error deleting from cart: " . $e->getMessage());
        }
    }

    public function getPanierByidUser($idUser)
    {
        $sql = "SELECT * FROM panier WHERE user_id = :iduser";
        $params = ["iduser"=>$idUser];

        try {
            $result = $this->db->query($sql, $params)->findAll();
            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching cart items: " . $e->getMessage());
        }
    }

    public function deletePanierByidUser($idUser)
    {
        $sql = "DELETE FROM panier WHERE user_id = ?";
        $params = [$idUser];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error deleting cart items by user ID: " . $e->getMessage());
        }
    }
}

?>
