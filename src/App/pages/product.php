<?php
require_once "./partials/_sidbar.php";

require_once __DIR__. "./../database/Plant.php";
require_once __DIR__. "./../database/categories.php";

use App\database\Plant;

use \App\database\Categories;

$plant=new Plant();
$categorie=new Categories();

$plantes=$plant->getPlants();




?>
<main class=' w-full'>
    <?php require_once "./partials/_headerDeshboard.php"; ?>



    <div class="grid lg:grid-cols-2 gap-2">
        <?php foreach ($plantes as $plante) { ?>
            <div class="group mx-2 mt-10 grid max-w-xl grid-cols-12 space-x-8 overflow-hidden rounded-lg border py-8 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto">
                <div class="grid h-16 w-16 ml-4  place-items-center  ">
                    <img class="h-full rounded-lg " src="<?php echo $plante['image']; ?>" alt="">
                </div>

                <div class="col-span-11 flex flex-col pr-8 text-left sm:pl-4">
                    <h3 class="text-2xl font-semibold text-gray-600"> <?php echo $plante['nomPlante']; ?></h3>


                    <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2">
                        <div class="">
                            Price:
                            <span class="ml-2 mr-3 rounded-full bg-green-100 px-2 py-0.5 text-green-900 capitalize">
                                <?php echo $plante['price']; ?> $
                            </span>
                        </div>
                        <div class="">
                            Categorie:
                            <span class="categorie ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900 capitalize">
                                <?php
                                $Ncategorie = $categorie->getCategorieByid($plante['categirie_id']);
                                foreach ($Ncategorie as $cat) {
                                    $nomCateforie = $cat["NomCateforie"] ?? null;
                                    var_dump($nomCateforie); // Output the value or NULL if the key is missing or NULL
                                }
                                 ?>
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2">


                        <button value="<?php echo $plante['idPlante'] ?>" class="btn-edit bg-transparent hover:bg-green-700 text-green-700 font-semibold hover:text-black py-2 px-3 border border-green-500 hover:border-transparent rounded">Edit</button>
                        <a onclick="return confirm('Are you sure you want to delete this record?');" href="../crud-data/delete.php?id=<?php echo $plante['idPlante'] ?>" class="bg-transparent hover:bg-rose-500 text-rose-700 font-semibold hover:text-black py-2 px-3 border border-rose-500 hover:border-transparent rounded">Delete</a>


                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <?php include_once "./partials/modal.php"; ?>


</main>





</div>

<script src="/public/assets/js/product.js">

</script>

</body>


</html>