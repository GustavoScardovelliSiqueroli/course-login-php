<?php

namespace app\controllers;

use app\controllers\MainPageController;
use app\services\UserService;
use app\models\UserModel;

final class UserController
{
    public static function login($requestMethod)
    {   
        if (MainPageController::isGET($requestMethod)) {
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

    public static function register($requestMethod)
    {
        if (MainPageController::isGET($requestMethod)) {
        return MainPageController::renderMainPage('register-user');
        }

        $user = new UserModel(name: $_POST["login"], password:$_POST["password"], email:$_POST["email"]);
        $userService = new UserService();
        $userService->register($user);
        header("Location: ./login");

    }

}
