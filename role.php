<?php
require_once "./database/conn.php";
include_once "./partials/_header.php";

$previous = "javascript:history.go(-1)";
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}


if (isset($_POST["client"])) {
    $result = UpdateRoleByEmail($email, 200, 3);
    if ($result) {
        header("Location: index.php");
    }
}
if (isset($_POST["admin"])) {
    $result = UpdateRoleByEmail($email, 403, 2);
    if ($result) {
        header("Location: 403.php");
    }
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