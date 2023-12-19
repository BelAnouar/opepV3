<?php
namespace Services;

require_once "./../../Framework/Datebase.php";

use Framework\Database;

class ThemeService
{

    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addTheme($NomTheme,$desc)
    {
        $sql = "INSERT INTO themes (themeName,themeDescription) VALUES (:themes,:description)";
        $params = [
            'themes' => $NomTheme,
            "description"=>$desc

        ];

        try {
            $this->db->query($sql, $params);


            $lastInsertedId = $this->db->id();

            return $lastInsertedId;
        } catch (\Exception $e) {
            throw new \Exception("Error adding plant: " . $e->getMessage());
        }
    }

    public function getThemes()
    {
        try {
            $sql = "SELECT * FROM themes";
            $themes = $this->db->query($sql)->findAll();

            return $themes;


        } catch (\Exception $e) {
            throw new \Exception("Error retrieving themes: " . $e->getMessage());
        }
    }

    public function deleteTheme($themeId)
    {
        try {
            $sql = "DELETE FROM themes WHERE themeId = :themeId";
            $params = ['themeId' => $themeId];

            $this->db->query($sql, $params);

            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error deleting theme: " . $e->getMessage());
        }
    }



}