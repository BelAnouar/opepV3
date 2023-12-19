<?php

require_once "./../database/Article.php";
$article = new \App\database\Article();

$articles = $article->getAllArticles();

if(isset($_GET["search"])){
    $search=$_GET["search"];
    $articles = $article->getAllArticlesByName($search);
}
if(isset($_GET["tag"])){
    $tag=$_GET["tag"];
    $articles = $article->getAllArticlesByTag($tag);
}



$output = '';

if (!empty($articles)) {
    foreach ($articles as $articleItem) {
        $output .= '<div class="w-11/12 mx-auto article">';
        $output .= '<div class="bg-white shadow-lg shadow-gray-300 m-4 p-4 rounded-lg">';
        $output .= '<a href="articlePage.php?article=' . $articleItem['articleId'] . '" class="flex justify-between text-white-50 font-medium hover:text-gray-500">' . $articleItem['articleTitle'] . '<span>';
        $output .= '<p class="text-sm p-1 rounded-xl border border-gray-500 text-gray-500">' . $articleItem['articleTag'] . '</p>';
        $output .= '</span></a>';
        $output .= '<p class="text-gray-800 m-2">' . $articleItem['articleContent'] . '...<span><a href="articlePage.php?article=' . $articleItem['articleId'] . '"><span class="hover:text-gray-500 font-medium">Read more</span></a></span></p>';
        $output .= '<div class="flex justify-between m-1">';
        $output .= '<small class="text-gray-500 flex items-center">';
        $output .= '<i class="bx bx-user text-black text-xl rounded-xl border-black"></i>';

        $output .= '</small>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }
} else {
    $output .= '<div class="flex items-center justify-center text-2xl h-[60vh]">';
    $output .= '<p>No articles found</p>';
    $output .= '</div>';
}

echo $output;
?>
