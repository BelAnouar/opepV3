
<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "Anwar@123";
$dbName = "OPEP";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


require_once  __DIR__ . "/user.php";

?>