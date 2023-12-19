<?php

namespace App\database;

require_once "./../services/ArticleService.php";

use Services\ArticleService;


class Article
{

    private ArticleService $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }



    public function addArticle($title, $content, $userId, $themeId, $tag){
        $this->articleService->insertArticle($title, $content, $userId, $themeId, $tag);
   }

    public function getAllArticles()
    {
        try {
            return $this->articleService->selectAllArticles();
        } catch (\Exception $e) {

            throw new \Exception("Error getting all articles: " . $e->getMessage());
        }
    }
    public  function getAllArticlesByName($search){
        $articles= $this->articleService->selectAllArticles();
        $filterArt=array_filter($articles,fn($art)=>str_contains($art["articleTitle"], $search));
        return $filterArt;
    }

    public  function getAllArticlesByTag($tag){
        $articles= $this->articleService->selectAllArticles();
        $filterArt=array_filter($articles,fn($art)=>$art["articleTag"]== $tag);
        return $filterArt;
    }
}