

<?php
session_start();
require_once "./partials/_header.php";

?>




<div class="h-[70vh] w-4/5 mx-auto shadow-xl rounded-xl border my-8">
    <form method="POST" class="flex flex-col justify-around items-center h-full">
        <input type="text" name="title" id="title" placeholder="Title" class="p-1 w-3/4 shadow-lg border-t-2 rounded-lg">
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Article content" class="w-3/4 shadow-md p-1 border-t-2 rounded-lg"></textarea>
        <div class="flex w-3/4 justify-between items-center">
            <select name="tag" id="tag" class="block leading-5 text-gray-700 bg-white border-transparent rounded-md focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-300 w-[30%] h-[40px]">
                <option value="" hidden selected>Select tag...</option>

                        <option value=" $tagName "> $tagName </option>

                    <option value="" disabled selected hidden>No tags available</option>

            </select>
            <input type="submit" name="submit" value="Add article" class="cursor-pointer px-8 py-2 bg-[#9fff30] font-semibold rounded-lg border-2 border-[#6da22f]">
        </div>
    </form>
</div>



<?php
include_once "./partials/_footer.php";
?>