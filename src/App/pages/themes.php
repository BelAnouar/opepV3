<?php
session_start();
require_once "./partials/_header.php";

?>



    <main class="h-[84vh]">

    <h1 class="text-center m-4 text-xl">THE HOUSEPLANT & URBAN JUNGLE BLOG</h1>
    <div class="flex flex-col justify-center items-center">
        <div class="w-[70%] mx-auto h-[80vh]">

            <div class="w-full bg-white shadow-lg border-t shadow-gray-300 m-4 p-4 items-center rounded-lg">
                <h3 class="flex justify-between items-center text-white-50">
                    <a class="hover:text-green-400 text-xl" href="articles.php?theme=">jhsdk</a>
                    <span class="text-xl cursor-pointer hover:text-green-400">
                        <a href="articles.php?theme=">n Articles</a>
                    </span>
                </h3>
            </div>

        </div>
        <div class="w-[70%] mx-auto">
            <div class="pl-6">
                Showing
            </div>
            <div class="flex flex-row justify-center items-center gap-3">
                <a href="?page=1">First</a>

            </div>
        </div>
    </div>

    </main>




<?php
include_once "./partials/_footer.php";
?>