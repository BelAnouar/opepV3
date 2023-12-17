<?php

namespace Services;
require_once "./../../Framework/Datebase.php";

use Framework\Database;
class CommnadeService
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function ajouterCommande($idPlante, $iduser)
    {
        $sql = "INSERT INTO commande (idPlante, iduser) VALUES (?, ?)";
        $params = [$idPlante, $iduser];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error adding order: " . $e->getMessage());
        }
    }
}