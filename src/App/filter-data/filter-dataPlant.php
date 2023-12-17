<?php


require_once "./../database/Plant.php";
$plant = new \App\database\Plant();

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $rest = $plant->getPlantByName($search);
}

if (isset($_GET["category"])) {

    $category = $_GET["category"];
      if($category!="All") {
          $rest = $plant->getPlantByCategory($category);
      }else{
          $rest=$plant->getPlants();
      }
}

$output = '';

foreach ($rest as $pl) {
    $output .= '<div class="bg-white shadow-lg p-3 rounded-lg w-full max-w-xs mx-auto cursor-pointer hover:shadow-2xl border border-black/5 relative">
        <img class="mb-2 rounded-md" src="' . $pl['image'] . '" alt="">
        <div class="text-lg font-semibold max-w-[260px]">' . $pl['nomPlante'] . '</div>
        <div class="text-lg font-semibold text-green-600 mb-4">' . $pl['price'] . '$</div>
        
            <input type="hidden" name="plante_id" value="' . $pl['idPlante'] . '">
            <button onclick="AddToCard(' . $pl['idPlante'] . ')" type="submit" value="' . $pl['idPlante'] . '" class="absolute bottom-3 right-3 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 add-to-card">Add to Cart</button>
              
    </div>';
}

echo $output; // Display the generated HTML
?>
