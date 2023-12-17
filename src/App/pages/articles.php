<?php
session_start();
require_once "./partials/_header.php";

?>


    <header class="flex flex-col justify-between items-center h-[40vh] py-8 bg-white shadow-lg text-center">
        <div class="flex justify-between items-center w-[60%] mx-auto">
            <h1 class="text-3xl"> $themeName </h1>
            <a href="addArticle.php?theme=" class="px-4 py-2 bg-[#9fff30] font-semibold rounded-lg border-2 border-[#6da22f]">Add article +</a>
        </div>
        <div class="flex flex-wrap mx-auto justify-between w-[60%]">
            <div>
                <input type="radio" id="all" name="tags" class="tag peer hidden" value="All" checked />
                <label for="all" class="w-full p-1 px-4 border-2 rounded-xl select-none cursor-pointer

                    'peer-checked:border-amber-600 peer-checked:text-amber-600';
             ">
                    All
                </label>
            </div>

                <div>
                    <input type="radio" id="Tag" name="tags" class="tag peer hidden" value=" $tagName " />
                    <label for="Tag" class="w-full p-1 border-2 rounded-xl cursor-pointer
                       'peer-checked:border-amber-600 peer-checked:text-amber-600';
                  ">

                        $tagName
                    </label>
                </div>


        </div>
        <div class="flex items-center justify-center bg-gray-100 rounded border border-gray-200 mt-4 w-1/4 mx-auto">
            <input id="search-bar" type="text" name="search" placeholder="Search" class="flex items-center align-middle justify-center bg-transparent py-1 text-gray-600 px-4 focus:outline-none w-full" />
            <button class="py-2 px-4 bg-[#bdff72] text-black rounded-r border-l border-gray-200 hover:bg-gray-50 active:bg-gray-200 disabled:opacity-50 inline-flex items-center focus:outline-none">
                Search
            </button>
        </div>
    </header>


    <div class="flex flex-col justify-between items-center h-[90vh]">
        <div class="w-11/12 mx-auto article">




                    <div class=" bg-white shadow-lg shadow-gray-300 m-4 p-4 rounded-lg">

                        <a href="articlePage.php?article= $articleId " class="flex justify-between text-white-50 font-medium hover:text-gray-500"> $articleTitle <span>
                                <p class="text-sm p-1 rounded-xl border border-gray-500 text-gray-500"> $articleTag </p>
                            </span></a>
                        <p class="text-gray-800 m-2">articleDesc ...<span><a href="articlePage.php?article= $articleId "><span class="hover:text-gray-500 font-medium">Read more</span></a></span></p>
                        <div class="flex justify-between m-1">
                            <small class="text-gray-500 flex items-center">
                                <i class='bx bx-user text-black text-xl rounded-xl border-black'></i>
                                <p>Poted By  $userName </p>
                            </small>
                        </div>

                    </div>

                <div class="flex items-center justify-center text-2xl h-[60vh]">
                    <p>No articles found</p>
                </div>
        </div>

    </div>









<?php
include_once "./partials/_footer.php";
?>