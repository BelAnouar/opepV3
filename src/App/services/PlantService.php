<?php

namespace Services;

require_once "./../../Framework/Datebase.php";

use Framework\Database;
class PlantService
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPlant($nomPlante, $price, $image, $idCategorie)
    {
        $sql = "INSERT INTO plante (nomPlante, price, image, categirie_id) VALUES (:nomPlante, :price, :image, :idCategorie)";
        $params = [
            'nomPlante' => $nomPlante,
            'price' => $price,
            'image' => $image,
            'idCategorie' => $idCategorie
        ];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error adding plant: " . $e->getMessage());
        }
    }

    public function getPlants()
    {

        try {

            $sql = "SELECT * FROM plante";


            $plants = $this->db->query($sql)->findAll();

            return $plants;
        } catch (\Exception $e) {

            throw new \Exception("Error fetching plants: " . $e->getMessage());
        }
    }


    public function deletePlant($idPlante)
    {

        $sql = "DELETE FROM plante WHERE idPlante = ?";
        $params = [$idPlante];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error deleting cart items by user ID: " . $e->getMessage());
        }

    }

    public function getPlantsByUserId($userId)
    {
        $plants = array();

        $sql = "SELECT * FROM plante INNER JOIN panier ON plante.idPlante = panier.plante_id WHERE panier.user_id = :userId";
        $params = ['userId' => $userId];

        try {
            $result = $this->db->query($sql, $params)->findAll();

            if ($result) {
                $plants = $result;
            }
        } catch (\Exception $e) {
            throw new \Exception("Error fetching plants by user ID: " . $e->getMessage());
        }

        return $plants;
    }

    public function updatePlant($idPlante, $nomPlante, $price, $image, $idCategorie)
    {
        $sql = "UPDATE plante SET nomPlante = :nomPlante, price = :price, image = :image , categirie_id = :idCategorie WHERE idPlante = :idPlante";
        $params = [
            'nomPlante' => $nomPlante,
            'price' => $price,
            'image' => $image,
            'idCategorie' => $idCategorie,
            "idPlante"=>$idPlante
        ];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error updating plant: " . $e->getMessage());
        }

    }


    public function getPlantByCategory($category){


        $sql = "SELECT * FROM  plante  WHERE categirie_id = :categoryId";
        $params = ['categoryId' => $category];

        try {
            $result = $this->db->query($sql, $params)->findAll();

            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching plants by user ID: " . $e->getMessage());
        }


    }

    public function getPlantByName($namePlante){


        $sql = "SELECT * FROM plante  WHERE nomPlante = :nomPlante";
        $params = ['nomPlante' => $namePlante];

        try {
            $result = $this->db->query($sql, $params)->findAll();

            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching plants by user ID: " . $e->getMessage());
        }


    }
}