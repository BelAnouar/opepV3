<?php


require_once "./../database/Tag.php";
$tag = new \App\database\Tag();
if(isset($_POST["tagname"])){

   $tahNAme= $_POST["tagname"];
   $tag->addTag($tahNAme);

}

if(isset($_GET["tagId"])){
    $id=$_GET["tagId"];
    $tag->deleteTAg($id);
}

if(isset($_POST["tagId2"])){
    $idTag=$_POST["tagId2"];
    $nametag=$_POST["tagname2"];
        $tag->update($idTag,$nametag);
}


$tags = $tag->getTags(); // Assuming $tag is an instance with getTags() method

// Building the HTML table content and storing it in a variable
$tableOutput = '';
if (count($tags) > 0) {
    $tableOutput .= '<table class="table-fixed w-full">';
    $tableOutput .= '<thead class="border">';
    $tableOutput .= '<tr class="border-2">';
    $tableOutput .= '<th class="w-1/5 px-4 py-2 border-2 border-[#A3A3A3] text-xs md:text-base">Tag Id</th>';
    $tableOutput .= '<th class="w-3/5 px-4 py-2 border-2 border-[#A3A3A3] text-xs md:text-base">Name</th>';
    $tableOutput .= '<th class="w-1/5 px-4 py-2 border-2 border-[#A3A3A3] text-xs md:text-base">Action</th>';
    $tableOutput .= '</tr>';
    $tableOutput .= '</thead>';
    $tableOutput .= '<tbody id="tbody">';
    foreach ($tags as $row) {
        $tagName = htmlspecialchars($row['tagName']);
        $tagId = htmlspecialchars($row['idTag']);
        $tableOutput .= '<tr>';
        $tableOutput .= '<td class="px-4 py-2 border-2 text-center border-[#A3A3A3] text-xs md:text-base">' . $tagId . '</td>';
        $tableOutput .= '<td class="px-4 py-2 border-2 text-center border-[#A3A3A3] text-xs md:text-base">' . $tagName . '</td>';
        $tableOutput .= '<td class="px-1 py-2 border-2 text-center border-[#A3A3A3] text-xs md:text-base">';
        $tableOutput .= '<button id="showdetails" onclick="showTagDetails(\'' . $tagName . '\',' . $tagId . ')" class="px-2 rounded-md bg-amber-500"> Modify </button>';
        $tableOutput .= '<button onclick="deleteTag(' . $tagId . ')" class="px-2 rounded-md bg-red-500"> Delete </button>';
        $tableOutput .= '</td>';
        $tableOutput .= '</tr>';
    }
    $tableOutput .= '</tbody>';
    $tableOutput .= '</table>';
} else {
    // If there are no tags in the database
    $tableOutput = '<div class="w-full h-[100vh] flex items-center justify-center">';
    $tableOutput .= '<p>No tags in database</p>';
    $tableOutput .= '</div>';
}

// Outputting the table content wherever needed
echo $tableOutput;
?>

