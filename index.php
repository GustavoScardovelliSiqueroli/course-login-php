<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div style="width: 100%; height:100%; display:flex; align-items:center; justify-content:center;">

        <div class="form-login">
            <h1>Login to my website</h1>
            <div class="form-content">

                <form action="" method="post">
                    <input type="text" name="login" id="login" placeholder="Login">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <input type="submit" value="Log in">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] = "POST") {
    include "validate.php";

    $validate = new GsssValidate($_POST["login"], $_POST["password"]);
    $validateRerturn = $validate->validate();

    if(empty($validateRerturn)){
        include "./connectionDB.php";   
    }

    foreach ($validateRerturn as $value) {
        if ($value == 1) {
            echo '<script src="./setBgLogin.js"></script>';
        }
        if ($value == 2) {
            echo '<script src="./setBgPassword.js"></script>';
        }
    }
}
?>