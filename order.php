<?php

require_once "./database/conn.php";
if (isset($_POST["Add"])) {
    $categorie = $_POST["categorie"];
    $result = ajouterCAtegorie($categorie);
}
include "./partials/_sidbar.php";
?>
<main class=' w-full'>
    <?php include "./partials/_headerDeshboard.php"; ?>









    <section class='w-70 md:col-span-2 relative h-fit   m-3  p-7 border rounded-lg bg-white '>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class=" lg:grid-cols-3 w-6/7 gap-5 ">
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
    <section class='w-70 md:col-span-2 relative h-fit   m-3  p-7 border rounded-lg bg-white '>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="lg:grid-cols-3 w-6/7 gap-5 ">
            <div class=" input-type">
                <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="Plant">
                    nom plante
                </label>
                <input type="text" id="Plant" name="Plant" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="Plant" />
            </div>
            <div class=" input-type">
                <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="price">
                    price
                </label>
                <input type="text" id="price" name="price" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="Plant" />
            </div>
            <div class=" input-type">
                <label class="block text-gray-700 text-md font-bold mb-2" htmlFor="image">
                    image
                </label>
                <input type="file" id="image" name="image" class="border w-full px-4 py-3 focus:outline-none rounded-md" placeholder="Plant" />
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

</main>

</div>


</body>

</html>