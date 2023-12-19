<?php

require_once "./partials/_sidbar.php";






?>



<main class=' w-full'>
    <?php require_once "./partials/_headerDeshboard.php"; ?>
>



    <div class="hidden bg-green-500"></div>
    <!-- Popup Structure -->
    <div id="popup" class="fixed w-full h-full top-0 left-0  items-center flex justify-center hidden z-50">
        <div class="bg-white w-7/12 h-fit border-2 border-amber-600 flex flex-col justify-start items-center overflow-y-auto rounded-2xl md:h-fit">
            <div class="bg-amber-600 w-7/12 h-8 fixed rounded-tr-2xl rounded-tl-2xl">
                <div class="flex justify-end">
                    <span onclick="closePopup()" class="text-2xl font-bold cursor-pointer mr-3">&times;</span>
                </div>
            </div>
            <form id="formTag" id="input_form" class="flex flex-col justify-between items-center h-full mt-[10vh]">
                <div class="mb-3 px-2 rounded-lg">
                    <p id="addErr" class="text-black text-lg text-center"></p>
                </div>
                <div class="flex flex-col mb-3">
                    <div class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                        <p class="text-xs">Tag name</p>
                        <input required class="placeholder:font-light placeholder:text-xs focus:outline-none" id="tagname" type="text" name="tagname" pattern="[a-zA-Z]+" placeholder="Name" autocomplete="off">
                    </div>
                </div>
                <div class="flex justify-end mb-4">
                    <input required type="submit" id="addTag" class="cursor-pointer px-8 py-2 bg-[#9fff30] font-semibold rounded-lg border-2 border-[#6da22f]" value="Add tag">
                </div>
            </form>
        </div>
    </div>
    <!-- End of Popup -->
    <!-- Popup Structure Edit ver. -->
    <div id="popupEdit" class="fixed w-full h-full top-0 left-0  items-center flex justify-center hidden z-50">
        <div class="bg-white w-7/12 h-fit border-2 border-amber-600 flex flex-col justify-start items-center overflow-y-auto rounded-2xl md:h-fit">
            <div class="bg-amber-600 w-7/12 h-8 fixed rounded-tr-2xl rounded-tl-2xl">
                <div class="flex justify-end">
                    <span onclick="closePopup()" class="text-2xl font-bold cursor-pointer mr-3">&times;</span>
                </div>
            </div>
            <form id="modify_formTag" class="flex flex-col justify-between items-center h-full mt-[10vh]">
                <div class="mb-3 px-2 rounded-lg">
                    <p id="modErr" class="text-white text-lg text-center"></p>
                </div>
                <div class="flex flex-col mb-3">
                    <div class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                        <p class="text-xs">Tag name</p>
                        <input required class="placeholder:font-light placeholder:text-xs focus:outline-none" id="tagname2" type="text" pattern="[a-zA-Z]+" name="tagname2" placeholder="Name" autocomplete="off" value="">
                    </div>
                </div>


                        <input  class="placeholder:font-light placeholder:text-xs focus:outline-none" id="tagId2" type="hidden" name="tagId2"  value="">

                <div class="flex justify-end mb-4">
                    <input required type="submit" id="modifyTag" class="cursor-pointer px-8 py-2 bg-[#9fff30] font-semibold rounded-lg border-2 border-[#6da22f]" value="Apply changes">
                </div>
            </form>
        </div>
    </div>
<!-- End of Popup -->
<div class="flex flex-col justify-end items-start h-[100vh]">
    <div class="flex justify-between w-full pl-8">
        <p class="border-gray-300 rounded-t-lg p-2 pb-1 text-xl">Tags</p>
        <button onclick="openPopup()" class="p-2 pb-1 bg-green-700 mb-2 rounded-md">Add Tag +</button>
    </div>
    <div class="border-2 border-gray-300 rounded-xl h-[90vh] w-full flex">
        <div id="tags" class="flex flex-col justify-between w-full p-4 tableTAg">


        </div>
    </div>
</div>
</main>





</div>

<script src="/public/assets/js/Tags.js">
</script>
</body>

</html>