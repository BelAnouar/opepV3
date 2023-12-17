<?php
use App\database\User;
require_once "./../database/User.php";
include_once "./partials/_header.php";


$user =new User();
if (isset($_POST["client"])) {
    $user->UpdateRole( 200, 3);

}
if (isset($_POST["admin"])) {
   $user->UpdateRole( 403, 2);
}

?>

<section class="flex justify-center items-center h-96">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-6">Choose your role:</h1>
        <div class="flex justify-center space-x-4">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <button type="submit" name="client" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Client</button>
                <button type="submit" name="admin" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Admin</button>
            </form>
        </div>
    </div>
</section>

<?php
include_once "./partials/_footer.php";
?>