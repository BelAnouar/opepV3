<?php
namespace Services;

require_once "./../../Framework/Datebase.php";

use Framework\Database;
class Themetag
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addThemeTag($themeId,$tagId)
    {
        $sql = "INSERT INTO tags_themes (themeId,tagId) VALUES (:themes,:tag)";
        $params = [
            'themes' => $themeId,
            "tag"=>$tagId

        ];

        try {
            $this->db->query($sql, $params);




            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error adding plant: " . $e->getMessage());
        }
    }


    public function getThemeTags()
    {
        $sql = "SELECT * FROM tags_themes";
        try {
            $result = $this->db->query($sql)->fetchAll();
            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error retrieving theme tags: " . $e->getMessage());
        }
    }



    public function getTags($themeId)
    {
        $sql = "SELECT tags.idTag, tags.tagName FROM tags_themes JOIN tags ON tags_themes.tagId = tags.idTag WHERE tags_themes.themeId = :themeId";
        $params = ['themeId' => $themeId];

        try {
            $result = $this->db->query($sql, $params)->findAll();
            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error retrieving theme tags: " . $e->getMessage());
        }
    }

}