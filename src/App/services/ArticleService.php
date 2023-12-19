<?php


namespace Services;


require_once "./../../Framework/Datebase.php";

use Framework\Database;


class ArticleService
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertArticle($title, $content, $userId, $themeId, $tag)
    {
        $sql = "INSERT INTO articles (articleTitle, articleContent, userId, themeId, articleTag) VALUES (:title, :content, :userId, :themeId, :tag)";
        $params = [
            'title' => $title,
            'content' => $content,
            'userId' => $userId,
            'themeId' => $themeId,
            'tag' => $tag
        ];

        try {
            $this->db->query($sql, $params);
            return true; // Return true upon successful insertion
        } catch (\Exception $e) {
            throw new \Exception("Error adding article: " . $e->getMessage());
        }
    }


    public function selectAllArticles()
    {
        $sql = "SELECT * FROM articles";
        try {
            $result = $this->db->query($sql)->findAll();
            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error retrieving all articles: " . $e->getMessage());
        }
    }

    public function selectArticleById($articleId)
    {
        $sql = "SELECT * FROM articles WHERE articleId = :articleId";
        $params = [
            'articleId' => $articleId
        ];

        try {
            $result = $this->db->query($sql, $params)->fetch();
            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error retrieving article by ID: " . $e->getMessage());
        }
    }
}