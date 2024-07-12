<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="static/css/style.css">

</head>

<body>
    <?php
    include __DIR__ . "/static/templates/navBar.html"
    ?>
    <div style="width: 100%; height:100%; display:flex; align-items:center; justify-content:center;">

        <div class="form-login">
            <h1>Login to my website</h1>
            <div class="form-content">

                <form action="" method="post">
                    <input type="text" name="login" id="login" placeholder="Login">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <input type="submit" value="Log in" name="submit" id="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST["submit"])) {

        $validate = new UtilsGS();
        $validateRerturn = $validate->validateFourChars([$_POST["login"], $_POST["password"]]);

        if (empty($validateRerturn)) {
            $userService = new UserService();
            $user = new UserModel(name: $_POST["login"], password: $_POST["password"]);
            try {
                $userService->login($user);
            } catch (Exception $e) {
                echo '<script src="./static/js/loginFailed.js"></script>';
            }
        }

        foreach ($validateRerturn as $key => $value) {
            if ($value == $_POST["login"]) {
                echo '<script src="./static/js/setBgLogin.js"></script>';
            }
            if ($value == $_POST["password"]) {
                echo '<script src="./static/js/setBgPassword.js"></script>';
            }
        }
    }
}
?>