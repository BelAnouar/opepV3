<?php
require_once "./partials/_header.php";
require_once "./database/conn.php";


if (isset($email)) {
    $idRole = getRoleByEmail($email);
    $role = $idRole['role_id'];
    // $location = match ($role) {
    //     3 => "",
    //     2 => header("Location: dashboard.php"),
    //     default => header("Location: register.php")
    // };
    // $location;
    switch ($role) {
        case 3:
            "";

            break;
        case 2:
            header("Location:dashboard.php");
            break;

        default:
            header("Location:register.php");
            break;
    }
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

if (isset($_GET['btn-search'])) {
    $nomPlante = $_GET['search'];
    if (!empty($nomPlante)) {
        $plantes = array_filter($plantes, fn ($plante) => $plante['nomPlante'] == $nomPlante);
    } else {
        $plantes = array_map(fn ($plante) => $plante, $plantes);
    }
} else {
    $plantes = array_map(fn ($plante) => $plante, $plantes);
}

include_once "./addtoCart.php";

?>

<section class="h-full mx-h-[640px] mb-17 xl:mb-24">
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

<section class=" flex flex-row  ">
    <div class="relative text-gray-600 ml-auto">
        <form action="index.php" method="get">
            <input type="search" name="search" placeholder="Search" class="bg-white h-10 px-3 pr-10 rounded-full text-sm focus:outline-none border border-black/10 " />
            <button type="submit" name="btn-search" class="absolute right-0 top-0 mt-3 mr-4">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background: new 0 0 56.966 56.966" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </form>
    </div>
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