<?php
require_once "./partials/_header.php";
require_once "./database/conn.php";


if (isset($email)) {
    $idRole = getRoleByEmail($email);
    $role = $idRole['role_id'];
    $location = match ($role) {
        1 => header("Location:index.php"),
        2 => header("Location: dashboard.php"),
        default => header("Location: register.php")
    };
    $location;
}

$plantes = getPlantes();
$categories = getCategories();
if (isset($_GET["filter"])) {
    $categorie_id = $_GET["filter"];
    if ($categorie_id) {
        $plantes = array_filter($plantes, fn ($plante) => $plante['categirie_id'] == $categorie_id);
    } else {
        $plantes = array_map(fn ($plante) => $plante, $plantes);
    }
}

if (isset($_POST["Remove"])) {

    $panier_id = $_POST["Remove"];

    $result = deletePanier($panier_id);
    if ($result) {
        echo 'deleted';
    }
}


$User = getUserByEmail($email);
if (isset($User)) {
    $user_id = $User["idUser"];
}


if (isset($_POST["plante_id"])) {

    $idPalante = $_POST["plante_id"];
    $result = ajouterPanier($idPalante, $user_id);
    if ($result) {
        echo "isert";
    }
}


include_once "./addtoCart.php";

?>

<section class="h-full mx-h-[640px] mb-8 xl:mb-24">
    <div class="flex flex-col lg:flex-row">

        <div class="lg:ml-8 xl:ml-[135px] flex flex-col items-center lg:items-start text-center lg:text-left justify-center flex-1 px-4 lg:px-0">
            <h1 class="text-4xl lg:text-[68px] font-semibold leading-none mb-6 text-green-900">
                Exploring the Beauty of Plants
            </h1>
            <p class="max-w-[480px] text-gray-500">
                Plants, essential to life on Earth, offer a spectrum of wonder and diversity. From towering trees to delicate flowers, each plant tells a unique story of adaptation and beauty.
            </p>
        </div>
        <div class="hidden flex-1 lg:flex justify-end items-end">
            <img class="" src="./assets/images/title.jpg" alt="title">
        </div>
    </div>
</section>

<section class="my-10 flex justify-center items-center">

    <form action="" method="get">
        <button name="filter" value="" class="<?php echo $categorie_id == $categorie['idCategorie']  ? 'bg-black text-white' : 'border-black text-black ' ?> border rounded-full px-4 py-2 text-sm font-semibold mr-4">All</button>
        <?php foreach ($categories as $categorie) { ?>
            <button name="filter" value="<?php echo $categorie['idCategorie']; ?>" class="border <?php echo $categorie_id == $categorie['idCategorie']  ? 'bg-black text-white' : 'border-black text-black ' ?>  rounded-full px-4 py-2 text-sm font-semibold mr-4"><?php echo $categorie['nomCateforie']; ?></button>

        <?php } ?>
    </form>
</section>


<section class="m-10">
    <div class="container mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-14">
            <?php foreach ($plantes as $plante) { ?>
                <div class="bg-white shadow-lg p-3 rounded-lg w-full max-w-xs mx-auto cursor-pointer hover:shadow-2xl border border-black/5 relative">
                    <img class="mb-2 rounded-md" src="<?php echo $plante['image']; ?>" alt="">
                    <div class="text-lg font-semibold max-w-[260px]">
                        <?php echo $plante['nomPlante']; ?>
                    </div>
                    <div class="text-lg font-semibold text-green-600 mb-4">
                        <?php echo $plante['price']; ?>$
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="plante_id" value="<?php echo $plante['idPlante']; ?>">
                        <button type="submit" class="absolute bottom-3 right-3 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Add to Cart</button>
                    </form>
                </div>
            <?php } ?>

        </div>
    </div>
</section>


<?php

include_once "./partials/_footer.php";
?>