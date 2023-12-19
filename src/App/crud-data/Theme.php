<?php
require_once "./../database/Theme.php";
$theme = new \App\database\Theme();

// Retrieve JSON data from POST request
$json = file_get_contents('php://input');
$data = json_decode($json, true); // Decode JSON to associative array

// Check if the required values exist in the received data
if (isset($data['arrayTags']) && isset($data['themeValue'])) {
    // Access the values from the received data
    $arrayTags = $data['arrayTags'];
    $themeValue = $data['themeValue'];
    $DescValue = $data['DescValue'];

    $theme->addTheme($themeValue,$DescValue,$arrayTags);

} else {
    // Handle the case when the required values are not received
    // For instance, return an error message or perform appropriate actions
    echo "Missing required data";
}
?>
