<?php



require_once __DIR__. "./../../database/categories.php";


$categorie=new \App\database\Categories();
$categories = $categorie->getCategorie();

?>

<div class="relative z-10 hidden modal">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <section class="w-70 md:col-span-2 relative lg:h-[60vh] h-[15vh] m-3 p-7 border rounded-lg bg-white">
                <h2 class="mb-4 inline-block">Update Plante</h2>

                <form id="formEditP" class="grid grid-cols-2 w-6/7 gap-5" action="./../../crud-data/edit.php" method="POST" enctype="multipart/form-data">
                    <div class="input-type">
                        <label for="modal-name" class="block text-gray-700 text-md font-bold mb-2">Nom Plante</label>
                        <input type="text" id="modal-name" name="modal-name" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="modal-name" />
                    </div>
                    <div class="input-type">
                        <label for="modal-price" class="block text-gray-700 text-md font-bold mb-2">Price</label>
                        <input type="text" id="modal-price" name="modal-price" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="modal-price" />
                    </div>
                    <div class="input-type">
                        <label for="modal-image" class="block text-gray-700 text-md font-bold mb-2">Image</label>
                        <input type="file" accept="image/*" id="modal-file" name="modal-file" class="border w-full px-4 py-3 focus:outline-none rounded-md" />
                    </div>
                    <div class="input-type">
                        <label for="modal-categorie" class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2">Categorie</label>
                        <select name="modal-categorie" id="modal-categorie" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option selected>Choose a Categorie</option>
                            <?php foreach ($categories as $categorie) { ?>
                                <option value="<?php echo $categorie['idCategorie']; ?>"><?php echo $categorie['nomCateforie']; ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-between">
                        <input type="hidden" id="modal-update" name="modal-update" value="">
                        <button type="submit"  class="mt-3 inline-flex w-full justify-center rounded-md bg-yellow-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-yellow-50 sm:mt-0 sm:w-auto">Update</button>
                        <button type="button" class="closemodal mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>