<?php
require_once "./database/conn.php";
session_start();


$email_err = "";
$password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


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

    if (empty($email_err) && empty($password_err)) {
        $new_password = md5($email . $password);

        $result = login($email, $password);
        if (!$result) {
            echo $errorMsg = "Email or Password is incorrect! Please try again. ";
        } else {


            if ($result['status'] == 403) {
                header("Location: role.php");
            } else {
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col">
                    <div class="card rounded-3">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <img src="./assets/images/login.jpg" alt="Register" class="img-fluid rounded-1" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-dark">

                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

                                        <div class="d-flex align-items-center mb-3 pb-1">

                                            <span class="h1 fw-bold mb-0 ms-1">O'PEP</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3">Sign In</h5>



                                        <div class="form-floating mb-4">
                                            <input type="email" name="email" class="form-control form-control-lg border <?php echo $email_err ? 'border-danger' : null; ?>" id="floatingEmail" placeholder="Email Address" />
                                            <label for="floatingEmail">Email Address</label>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="password" name="password" class="form-control form-control-lg border <?php echo $password_err ? 'border-danger' : null; ?>" id="floatingPassword" placeholder="Password" />
                                            <label for="floatingPassword">Password</label>
                                        </div>



                                        <div class="pt-1 mb-2">
                                            <button name="submit" class="btn btn-dark btn-lg btn-block" type="submit">login</button>
                                        </div>

                                        <p class="mb-2 pb-lg-2">Have an account?
                                            <a href="./register.php">Login here</a>
                                        </p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
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