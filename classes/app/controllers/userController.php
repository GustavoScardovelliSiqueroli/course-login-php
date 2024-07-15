<?php

namespace app\controllers;

use app\controllers\MainPageController;
use app\services\UserService;
use app\models\UserModel;

final class UserController
{
    public static function login($requestMethod)
    {   
        print_r($requestMethod);
        if (self::isGET($requestMethod)) {
            return MainPageController::renderMainPage('login',);
        }

        $user = new UserModel(name: $_POST["login"], password: $_POST["password"]);
        $userService = new UserService();
        $userID = $userService->login($user);
        
        if (!empty($userID)) {
            session_start();
            $_SESSION["user"] = $userID;
            header("Location: ./tasks");
        }
    }

    public static function register()
    {
        return MainPageController::renderMainPage('register-user');
    }

    public static function isGET($requestMethod)
    {
        if ($requestMethod == "GET") {
            return true;
        }
        return false;
    }
}
