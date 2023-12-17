<?php

namespace Services;
require_once "./../../Framework/Datebase.php";

use Framework\Database;
class CategoryService
{
    private Database $db;
    public function __construct()
    {
        $this->db=new Database();
    }


    public function getCategories()
    {

        try {

            $sql = "SELECT * FROM categories";


            $categories = $this->db->query($sql)->findAll();

            return $categories;
        } catch (\Exception $e) {

            throw new \Exception("Error fetching plants: " . $e->getMessage());
        }
    }

    public function ajouterCategorie($categorie)
    {

        $sql = "INSERT INTO categories (nomCateforie) VALUES (:nom)";
        $params = [
            'nom' => $categorie,

        ];


        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error registering user: " . $e->getMessage());
        }
    }

    public function updateCategory($idcat,$newNomCateforie)
    {
        $sql = "UPDATE categories SET nomCateforie = :nomCateforie WHERE idCategorie = :id";
        $params = [
            'nomCateforie' => $newNomCateforie,
            'id' => $idcat
        ];

        try {
            $this->db->query($sql, $params);
            return true; // Return a success message or true upon successful update
        } catch (\Exception $e) {
            throw new \Exception("Error updating category name: " . $e->getMessage());
        }
    }

}