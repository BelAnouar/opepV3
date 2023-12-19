<?php
require_once  "./../database/User.php";
require_once "./partials/_sidbar.php";





$user = new \App\database\User();
$users=$user->getUsers();


$userID=$_SESSION["user"];

?>
<main class=' w-full'>
    <?php require_once "./partials/_headerDeshboard.php"; ?>



    <section class='grid lg:grid-cols-6 gap-3 px-4'>
        <div class='lg:col-span-2 col-span-1 bg-green-200 flex justify-between w-full border p-4 rounded-lg'>
            <div class='flex flex-col w-full pb-4'>
                <p class='text-2xl font-bold'><?php echo count($users); ?></p>
                <p class='text-gray-600'>Users</p>
            </div>
            <div class='bg-green-400 flex justify-center items-center p-4 rounded-lg'>
                <span class='text-green-700 text-lg'>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                        <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                    </svg>

                </span>
            </div>
        </div>
        <div class='lg:col-span-2 col-span-1 bg-blue-200 flex justify-between w-full border p-4 rounded-lg'>
            <div class='flex flex-col w-full pb-4'>
                <p class='text-2xl font-bold'><?php echo "nn"; ?></p>
                <p class='text-gray-600'>Plant</p>
            </div>
            <div class='bg-blue-400 flex justify-center items-center p-4 rounded-lg'>
                <span class='text-blue-700 text-lg'>
                    Icon
                </span>
            </div>
        </div>
        <div class='lg:col-span-2 col-span-1 bg-yellow-200 flex justify-between w-full border p-4 rounded-lg'>
            <div class='flex flex-col w-full pb-4'>
                <p class='text-2xl font-bold'><?php echo "k"; ?></p>
                <p class='text-gray-600'>cate</p>
            </div>
            <div class='bg-yellow-400 flex justify-center items-center p-4 rounded-lg'>
                <span class='text-yellow-700 text-lg'>
                    icon
                </span>
            </div>
        </div>
    </section>






    <section class="container mx-auto px-4 sm:px-8">
        <div class="py-8">


            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">






                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    User
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Rol
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    email
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    check
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) {
                                if ($userID != $user['idUser']) { ?>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                                    </svg>

                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <?php echo $user['Nom']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap"><?php
                                                                                        $role_id = $user['role_id'];

                                                $role = ($role_id == 2) ? "admin" : (($role_id == 3) ? "clien" : "no role");

                                                echo $role;

                                                                                        ?></p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $user['email']; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <span class="relative inline-block px-3 py-1 font-semibold <?php echo $user['status'] == 200 ? "text-green-900" : "text-orange-900 " ?> leading-tight">
                                                <span aria-hidden class="absolute inset-0  <?php echo $user['status'] == 200 ? "bg-green-200" : "bg-orange-200 " ?>  opacity-50 rounded-full"></span>
                                                <span class="relative">Activo</span>
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                                <?php echo $user['status'] != 200 ?
                                                    '<button name="check" value="' . $user['idUser'] . '" class="inline-flex items-center justify-center h-8 w-8 border border-green-500 text-green-500 hover:bg-green-100 hover:text-green-600 rounded-full focus:outline-none">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 3.293a1 1 0 0 1 1.414 1.414l-10 10a1 1 0 0 1-1.414 0l-5-5a1 1 0 1 1 1.414-1.414L6 12.586l9.293-9.293a1 1 0 0 1 1.414 0z" clip-rule="evenodd" />
            </svg>
        </button>' :
                                                    '<button name="suspended" value="' . $user['idUser'] . '" class="inline-flex items-center justify-center h-8 w-8 border border-red-500 rounded-full text-red-500 hover:bg-red-100 hover:text-red-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>'
                                                ?>
                                            </form>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
</main>





</div>


</body>

</html>