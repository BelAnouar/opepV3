<?php


require_once __DIR__. "./../../database/categories.php";


$categorie=new \App\database\Categories();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-cat'])) {

    $idCategorie = $_POST['update-cat'];
    $nomCategorie = $_POST['modal-cat'];

    $category = $categorie->updateCategory($idCategorie, $nomCategorie);
}


?>


<div class="relative z-10 hidden modal">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <section class="w-70 md:col-span-2 relative lg:h-[60vh] h-[15vh] m-3 p-7 border rounded-lg bg-white">
                <h2 class="mb-4 inline-block">Update Categorie</h2>
                <form class="grid grid-cols-2 w-6/7 gap-5" action="" method="post">
                    <div class=" input-type">
                        <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="modal-cat">
                            Nom Categorie
                        </label>
                        <input type="text" id="modal-cat" name="modal-cat" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="modal-cat" />
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-between">
                        <button type="submit" value="" id="update-cat" name="update-cat" class=" mt-3 inline-flex w-full justify-center rounded-md bg-yellow-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-yellow-50 sm:mt-0 sm:w-auto">Update</button>
                        <button type="button" class="closemodal mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>