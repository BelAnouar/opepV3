<?php

require_once "./database/conn.php";
session_start();
$firstN_err = "";
$lastN_err = "";
$email_err = "";
$password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


    if (empty($_POST["FirstName"])) {
        $firstN_err = "fistname is Reqired";
    } else {

        $firstName = filter_input(INPUT_POST, "FirstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if (empty($_POST["LastName"])) {
        $lastN_err = "LastName is Reqired";
    } else {

        $lastName = filter_input(INPUT_POST, "LastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if (empty($_POST["email"])) {
        $email_err = "email is Reqired";
    } else {

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if (empty($_POST["password"])) {
        $password_err = "password is Reqired";
    } else {

        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($firstN_err) && empty($lastN_err) && empty($email_err) && empty($password_err)) {
        $rest =  register($firstName, $lastName, $email, $password);
        if ($rest) {

            $_SESSION["email"] = $email;
            header("Location: role.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="h-screen">
        <div class=" container mx-auto h-full">
            <div class="flex h-full">
                <div class="flex-1">
                    <div class="rounded-md border border-gray-300">
                        <div class="flex flex-col md:flex-row">
                            <div class="hidden md:block md:w-1/2">
                                <img src="./assets/images/login.jpg" alt="Register" class="w-full rounded-lg" />
                            </div>
                            <div class="md:w-1/2 flex items-center">
                                <div class="p-4 md:p-5 text-gray-900 w-full">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>

                                        <div class="flex items-center mb-3 pb-1">
                                            <span class="text-4xl font-bold mb-0 ml-1">O'PEP</span>
                                        </div>

                                        <h5 class="font-normal mb-3 pb-3">Sign Up</h5>

                                        <div class="mb-4">
                                            <label for="firstName" class="text-sm">First Name</label>
                                            <input type="text" name="FirstName" class="border border-gray-300 w-full py-3 px-4 rounded-lg focus:outline-none <?php echo $firstN_err ? 'border-red-500' : '' ?>" id="firstName" placeholder="Enter your first name" />
                                            <div>
                                                <?php echo $firstN_err; ?>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="lastName" class="text-sm">Last Name</label>
                                            <input type="text" name="LastName" class="border border-gray-300 w-full py-3 px-4 rounded-lg focus:outline-none <?php echo $lastN_err ? 'border-red-500' : '' ?>" id="lastName" placeholder="Enter your last name" />
                                            <div>
                                                <?php echo $lastN_err; ?>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="email" class="text-sm">Email Address</label>
                                            <input type="email" name="email" class="border border-gray-300 w-full py-3 px-4 rounded-lg focus:outline-none <?php echo $email_err ? 'border-red-500' : '' ?>" id="email" placeholder="Enter your email address" />
                                            <div>
                                                <?php echo $email_err; ?>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="password" class="text-sm">Password</label>
                                            <input type="password" name="password" class="border border-gray-300 w-full py-3 px-4 rounded-lg focus:outline-none <?php echo $password_err ? 'border-red-500' : '' ?>" id="password" placeholder="Enter your password" />
                                            <div>
                                                <?php echo $password_err; ?>
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-2">
                                            <button name="submit" class=" bg-black text-white text-lg px-6 py-3 rounded-lg" type="submit">Register</button>
                                        </div>

                                        <p class="mb-2 pb-2">Have an account?
                                            <a class="underline text-blue-600" href="./login.php">Login here</a>
                                        </p>
                                        <a href="#!" class="text-sm text-gray-500">Terms of use.</a>
                                        <a href="#!" class="text-sm text-gray-500">Privacy policy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>