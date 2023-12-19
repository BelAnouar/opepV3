<?php

require_once "./partials/_sidbar.php";
require_once "./../database/Tag.php";
require_once "./../database/Theme.php";
require_once "./../database/TagTheme.php";
$tag = new \App\database\Tag();
$theme=new \App\database\Theme();
$themeTag=new \App\database\TagTheme();



if(isset($_POST["DeleteTheme"])){
    $idTheme=$_POST["DeleteTheme"];
    $theme->deleteTheme($idTheme);
}


?>



<main class=' w-full'>
    <?php require_once "./partials/_headerDeshboard.php"; ?>


<!-- Popup Structure -->
<div id="popup" class="fixed w-full h-full top-0 left-0  items-center flex justify-center hidden z-50">
    <div class="bg-white w-7/12 h-fit border-2 border-amber-600 flex flex-col justify-start items-center overflow-y-auto rounded-2xl md:h-fit">
        <div class="bg-amber-600 w-7/12 h-8 fixed rounded-tr-2xl rounded-tl-2xl">
            <div class="flex justify-end">
                <span onclick="closePopup()" class="text-2xl font-bold cursor-pointer mr-3">&times;</span>
            </div>
        </div>
        <form  id="formTheme" class="flex flex-col justify-between items-center h-full mt-[10vh] w-full">
            <div class="bg-red-500 mb-3 px-2 rounded-lg">
                <p id="addErr" class="text-white text-lg text-center"></p>
            </div>
            <div class="flex flex-col mb-3 w-[80%]">
                <div class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                    <p class="text-xs">Theme name</p>
                    <input required class="placeholder:font-light placeholder:text-xs focus:outline-none" id="themeName" type="text" name="themeName" placeholder="Name" autocomplete="off">
                    <input required class="placeholder:font-light placeholder:text-xs focus:outline-none" id="themeDesc" type="text" name="themeDesc" placeholder="Description" autocomplete="off">
                </div>
            </div>
            <div class="flex flex-col mb-3 w-full">
                <p class="text-md font-medium text-center mb-4">Theme's tags</p>
                <div class="flex w-full justify-evenly flex-wrap">
                    <?php
                    $tags =$tag->getTags();

                    if (count($tags) > 0) {
                      foreach ($tags as $row) {
                            $tagId = $row['idTag'];
                            $tagName = $row['tagName'];

                            ?>
                            <div class="mb-4 checkTags">
                                <input type="checkbox"  id="tag" class="peer hidden  taglist TagTheme" value="<?= $tagId ?> ">
                                <label  class="namTags w-full p-1 border-2 rounded-xl select-none cursor-pointer peer-checked:border-amber-600 peer-checked:text-amber-600">
                                    <?= $tagName ?>
                                </label>
                            </div>
                            <?php

                        }

                    } else {
                        ?>
                        <option value="">No category exists</option>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="flex justify-end mb-4">
                <input required type="submit" id="addTheme" class="cursor-pointer px-8 py-2 bg-[#9fff30] font-semibold rounded-lg border-2 border-[#6da22f]" value="Add theme">
            </div>


        </form>
    </div>
</div>



    <div id="popupEditTag" class="fixed w-full h-full top-0 left-0  items-center flex justify-center hidden z-50">
        <div class="bg-white w-7/12 h-fit border-2 border-amber-600 flex flex-col justify-start items-center overflow-y-auto rounded-2xl md:h-fit">
            <div class="bg-amber-600 w-7/12 h-8 fixed rounded-tr-2xl rounded-tl-2xl">
                <div class="flex justify-end">
                    <span onclick="closePopupEdit()" class="text-2xl font-bold cursor-pointer mr-3">&times;</span>
                </div>
            </div>
            <form id="modify_form" class="flex flex-col justify-between items-center h-full mt-[10vh] w-full">
                <div class="bg-red-500 mb-3 px-2 rounded-lg">
                    <p id="modErr" class="text-white text-lg text-center"></p>
                </div>
                <div class="flex flex-col mb-3 w-[80%]">
                    <div class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                        <p class="text-xs">Theme name</p>
                        <input required class="placeholder:font-light placeholder:text-xs focus:outline-none" id="themeName2" type="text" name="themeName2" placeholder="Name" autocomplete="off" value="">
                    </div>
                </div>
                <div class="flex flex-col mb-3 w-full">
                    <p class="text-md font-medium text-center mb-4">Theme's tags</p>
                    <div class="flex w-full justify-evenly flex-wrap">


                    </div>
                </div>
                <div class="flex flex-col mb-3 hidden">
                    <div class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                        <p class="text-xs">theme id</p>
                        <input required class="placeholder:font-light placeholder:text-xs focus:outline-none" id="themeId" type="text" name="themeId" placeholder="Name" autocomplete="off" value="">
                    </div>
                </div>
                <div class="flex justify-end mb-4">
                    <input required type="submit" id="modifyTheme" class="cursor-pointer px-8 py-2 bg-[#9fff30] font-semibold rounded-lg border-2 border-[#6da22f]" value="Apply changes">
                </div>
            </form>
        </div>
    </div>
    <!-- End of Popup -->




    <?php
    // Retrieve all themes
    $records = $theme->getTheme();


    // HTML markup
    ?>
    <div class="flex flex-col justify-end items-start h-[100vh]">
        <div class="flex justify-between w-full pl-8">
            <p class="border-gray-300 rounded-t-lg p-2 pb-1 text-xl">Themes</p>
            <button onclick="openPopup()" class="p-2 pb-1 bg-green-700 mb-2 rounded-md">Add Theme +</button>
        </div>
        <div class="border-2 border-gray-300 rounded-xl h-[90vh] w-full flex">
            <div id="themes" class="flex flex-col justify-between w-full p-4">
                <?php if (count($records) > 0) { ?>
                    <table class="table-fixed w-full">
                        <thead class="border">
                        <tr class="border-2">
                            <th class="w-1/12 px-4 py-2 border-2 border-[#A3A3A3] text-xs md:text-base">Theme Id</th>
                            <th class="w-5/12 px-4 py-2 border-2 border-[#A3A3A3] text-xs md:text-base">Title</th>
                            <th class="w-4/12 px-4 py-2 border-2 border-[#A3A3A3] text-xs md:text-base">Tags</th>
                            <th class="w-2/12 px-4 py-2 border-2 border-[#A3A3A3] text-xs md:text-base">Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        <?php foreach ($records as $row) {
                            $themeId = htmlspecialchars($row['themeId']);
                            $themeName = htmlspecialchars($row['themeName']);
                            ?>
                            <tr>
                                <td class="px-4 py-2 border-2 text-center border-[#A3A3A3] text-xs md:text-base"><?= $themeId ?></td>
                                <td class="px-4 py-2 border-2 text-center border-[#A3A3A3] text-xs md:text-base"><?= $themeName ?></td>
                                <td id="tags<?= $themeId ?>" class="flex flex-wrap items-center justify-center px-4 py-2 text-center border-b-2 border-[#A3A3A3] text-xs md:text-base">
                                    <?php
                                    $TagsTheme = $themeTag->getTags($themeId);

                                    if (is_array($TagsTheme) && count($TagsTheme) > 0) {
                                    foreach ($TagsTheme as $rowTag) {
                                        $tagName = isset($rowTag['tagName']) ? $rowTag['tagName'] : '';
                                        $tagId = isset($rowTag['idTag']) ? $rowTag['idTag'] : '';

                                        ?>
                                        <span class="p-1 border-2 rounded-xl select-none border-amber-600 text-amber-600 mr-[2px]" value="<?= $tagId ?>"><?= $tagName ?></span>
                                    <?php }} ?>
                                </td>
                                <td class="px-1 py-2 border-2 text-center border-[#A3A3A3] text-xs md:text-base">

                                    <button id="showdetails" onclick="showThemeDetails('<?php echo $themeName; ?>', <?= $themeId ?>)" class="px-2 rounded-md bg-amber-500"> Modify </button>
                                        <form action=""  method="POST">      <button type="submit" name="DeleteTheme" value="<?= $themeId ?>" class="px-2 rounded-md bg-red-500"> Delete </button></form>
                                </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="w-full h-[100vh] flex items-center justify-center">
                        <p>No themes in the database</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    </div>
</main>
<script src="/public/assets/js/Theme.js">
</script>
</body>

</html>