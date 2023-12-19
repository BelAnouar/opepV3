<?php

require_once "./partials/_header.php";

require_once "./../database/Theme.php";

$theme=new \App\database\Theme();
$records = $theme->getTheme();
?>



    <main class="h-[84vh]">

    <h1 class="text-center m-4 text-xl">THE HOUSEPLANT & URBAN JUNGLE BLOG</h1>
    <div class="flex flex-col justify-center items-center"><?php foreach ($records as $row) {
    $themeId = htmlspecialchars($row['themeId']);
    $themeName = htmlspecialchars($row['themeName']);
    ?>
        <div class="w-[70%] mx-auto h-[80vh]">

            <div class="w-full bg-white shadow-lg border-t shadow-gray-300 m-4 p-4 items-center rounded-lg">
                <h3 class="flex justify-between items-center text-white-50">
                    <a class="hover:text-green-400 text-xl" href="articles.php?theme=<?=$themeId?>"><?= $themeName?></a>
                    <span class="text-xl cursor-pointer hover:text-green-400">
                        <a href="articles.php?theme=<?=$themeId?>">n Articles</a>
                    </span>
                </h3>
            </div>

        </div>
    <?php }?>

    </div>

    </main>




<?php
include_once "./partials/_footer.php";
?>