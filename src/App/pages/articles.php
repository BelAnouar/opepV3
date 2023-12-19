<?php

require_once "./partials/_header.php";
require_once "./../database/TagTheme.php";

$themeTag=new \App\database\TagTheme();
$themeId=null;
if (isset($_GET["theme"])){
    $themeId=$_GET["theme"];
}
?>


    <header class="flex flex-col justify-between items-center h-[40vh] py-8 bg-white shadow-lg text-center">
        <div class="flex justify-between items-center w-[60%] mx-auto">

            <a href="addArticle.php?theme=<?=$themeId?>" class="px-4 py-2 bg-[#9fff30] font-semibold rounded-lg border-2 border-[#6da22f]">Add article +</a>
        </div>
        <div class="flex flex-wrap mx-auto justify-between w-[60%]">

            <div>
                <input type="radio" id="all" name="tags" class="tag peer hidden" value="All" checked />
                <label for="all" class="labtagName w-full p-1 px-4 border-2 rounded-xl select-none cursor-pointer

                    'peer-checked:border-amber-600 peer-checked:text-amber-600 ';
             ">
                    All
                </label>
            </div>
<?php
$TagsTheme = $themeTag->getTags($themeId);

if (is_array($TagsTheme) && count($TagsTheme) > 0) {
    foreach ($TagsTheme as $rowTag) {
        $tagName = isset($rowTag['tagName']) ? $rowTag['tagName'] : '';
        $tagId = isset($rowTag['idTag']) ? $rowTag['idTag'] : '';

        ?>
                <div>
                    <input type="radio" id="Tag" name="tags" class="tag peer hidden" value="<?=$tagName?> " />
                    <label for="Tag" class="labtagName w-full p-1 border-2 rounded-xl cursor-pointer
                       'peer-checked:border-amber-600 peer-checked:text-amber-600 ';
                  ">

                        <?=$tagName?>
                    </label>
                </div>

 <?php  }}?>
        </div>
        <div class="flex items-center justify-center bg-gray-100 rounded border border-gray-200 mt-4 w-1/4 mx-auto">
            <input id="search-bar" type="text" name="search" placeholder="Search" class="flex items-center align-middle justify-center bg-transparent py-1 text-gray-600 px-4 focus:outline-none w-full" />
            <button class="py-2 px-4 bg-[#bdff72] text-black rounded-r border-l border-gray-200 hover:bg-gray-50 active:bg-gray-200 disabled:opacity-50 inline-flex items-center focus:outline-none">
                Search
            </button>
        </div>
    </header>


    <div id="cardArticles" class="flex flex-col justify-between items-center h-[90vh]">


    </div>







<script src="/public/assets/js/article.js"></script>

<?php
include_once "./partials/_footer.php";
?>