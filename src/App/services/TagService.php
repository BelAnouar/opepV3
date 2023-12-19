<?php


namespace Services;

require_once "./../../Framework/Datebase.php";

use Framework\Database;

class TagService
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }



    public function addTag($nomTag)
    {
        $sql = "INSERT INTO tags (tagName) VALUES (:nomTag)";
        $params = [
            'nomTag' => $nomTag

        ];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error adding plant: " . $e->getMessage());
        }
    }
    public function getTags()
    {

        try {

            $sql = "SELECT * FROM tags";


            $tags = $this->db->query($sql)->findAll();

            return $tags;
        } catch (\Exception $e) {

            throw new \Exception("Error fetching plants: " . $e->getMessage());
        }
    }

    public function deleteTag($idTag)
    {

        $sql = "DELETE FROM tags WHERE idTag = ?";
        $params = [$idTag];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error deleting cart items by user ID: " . $e->getMessage());
        }

    }

    public function updateTag($idTag, $nomTag)
    {
        $sql = "UPDATE tags SET tagName = :nomTag WHERE idTag = :idTag";
        $params = [
            'nomTag' => $nomTag,

            "idTag"=>$idTag
        ];

        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error updating plant: " . $e->getMessage());
        }

    }
}