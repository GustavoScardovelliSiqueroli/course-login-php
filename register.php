<?php
spl_autoload_register(function ($class) {
    include "classes\\" . $class . '.php';
});
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>

</body>

</html>

<?php

use \utils\UtilsGS;
use \utils\ViewUtils;
use \app\models\UserModel;
use \app\services\UserService;

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST["submit"])) {

        $validate = new UtilsGS();
        $validateRerturn = $validate->validateFourChars([$_POST["login"], $_POST["password"]]);
        if (empty($validateRerturn)) {
            $newUser = new UserModel(null, $_POST["login"], $_POST["password"], $_POST["email"]);
            $userService = new UserService();
            $userService->register($newUser);
        }
        foreach ($validateRerturn as $key => $value) {
            if ($value == $_POST["login"]) {
                echo '<script src="./statci/js/setBgLogin.js"></script>';
            }
            if ($value == $_POST["password"]) {
                echo '<script src="./static/js/setBgPassword.js"></script>';
            }
        }
    }
}
