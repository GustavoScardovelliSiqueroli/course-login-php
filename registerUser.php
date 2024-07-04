<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div style="width: 100%; height:100%; display:flex; align-items:center; justify-content:center;">

        <div class="form-register">
            <h1>Register to my website</h1>
            <br>
            <div class="form-content">

                <form action="" method="post">
                    <input type="text" name="login" id="login" placeholder="Login">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="submit" value="Register" name="submit" id="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    include './validate.php';
    include './userModel.php';
    include './userService.php';

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST["submit"])) {
        $validate = new GsssValidate($_POST["login"], $_POST["password"]);
        $validateRerturn = $validate->validate();
        if (empty($validateRerturn)) {

            $newUser = new UserModel(null, $_POST["login"], $_POST["password"], $_POST["email"]);
            $userService = new UserService();
            $userService->save($newUser);
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
}
