<?php

require_once  "./../database/categories.php";


$categorie=new \App\database\Categories();
$categories = $categorie->getCategorie();
require_once "./partials/_sidbar.php";
?>
<main class=' w-full'>
    <?php require_once "./partials/_headerDeshboard.php"; ?>









    <section class='w-70 md:col-span-2 relative h-fit   m-3  p-7 border rounded-lg bg-white '>

        <form id="formCat"  method="post" class=" lg:grid-cols-3 w-6/7 gap-5 ">
            <div class=" input-type">
                <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="categorie">
                    Catrgories
                </label>
                <input type="text" id="categorie" name="categorie" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="categorie" />
            </div>



            <div>

                <button type="submit" name="Add" class="flex justify-center text-md w-2/6 py-2 mt-[2.5rem] bg-green-500 text-white  border rounded-md hover:text-black hover:bg-gray-50 hover:border-green-500 ">
                    Add <span class="px-1">
                        <AddCircleOutlineIcon />
                    </span>
                </button>
            </div>

        </form>
    </section>










    <section class='w-70 h-fit m-3 p-7 border rounded-lg bg-white'>
        <form id="plantForm" class="grid lg:grid-cols-2 gap-5" action="./../crud-data/addplante.php" method="post" enctype="multipart/form-data">
            <div class="input-type">
                <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="Plant">
                    Nom Plante
                </label>
                <input type="text" id="Plant" name="Plant" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="Plant" />
            </div>

            <div class="input-type">
                <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="price">
                    Price
                </label>
                <input type="text" id="price" name="price" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="Price" />
            </div>

            <div class="input-type">
                <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="image">
                    Image
                </label>
                <input type="file" accept="image/*" name="img" id="image" class="border w-full px-4 py-3 focus:outline-none rounded-md" />
            </div>

            <div class="input-type">
                <label for="countries" class="block text-gray-700 text-md font-bold mb-2">Categorie</label>
                <select id="countries" name="categorie" class="border w-full px-4 py-3 focus:outline-none rounded-md">
                    <option selected>Choose a Categorie</option>
                    <?php
                    // Assuming $categories is an array of categories obtained from database
                    foreach ($categories as $categorie) {
                        echo '<option value="' . $categorie['idCategorie'] . '">' . $categorie['nomCateforie'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div>
                <button type="submit" name="addPlant" class="flex justify-center text-md w-2/6 py-2 mt-[2.5rem] bg-green-500 text-white border rounded-md hover:text-black hover:bg-gray-50 hover:border-green-500">
                    Add <span class="px-1">
                    <AddCircleOutlineIcon />
                </span>
                </button>
            </div>
        </form>
    </section>

</main>

</div>

<script src="/public/assets/js/Order.js"></script>
</body>

</html>