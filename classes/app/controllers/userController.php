<?php

namespace app\controllers;

use app\controllers\MainPageController;
use app\services\UserService;
use app\models\UserModel;

final class UserController
{
    public static function login($requestMethod)
    {
        if ($requestMethod === "POST") {
            if ($_POST["submit"] === "Log in") {

                $user = new UserModel(name: $_POST["login"], password:$_POST["password"]);
                $userService = new UserService();
                $userService->login($user);
            }
        }

        return MainPageController::renderMainPage('login',);
    }

    public static function register(){
        return MainPageController::renderMainPage('register-user');
    }
}
