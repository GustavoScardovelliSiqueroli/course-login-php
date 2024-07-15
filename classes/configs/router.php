<?php

namespace configs;

use app\controllers\UserController;
use app\controllers\TaskController;

class Router
{
    public static function mainRouter(): void
    {
        // Obtém o caminho da URL
        $request = $_GET['path'] ?? '';

        switch ($request) {
            case 'login':
            case 'login/':
                echo UserController::login(self::getMethod());
                break;

            case 'register':
            case 'register/':
                echo UserController::register();
                break;

            case 'tasks':
            case 'tasks/':
                echo TaskController::homeTaks();
                break;
            default:
                // Exibir página de erro 404
                http_response_code(404);
                echo "<h1>Page not found!</h1>";
                break;
        }
    }

    private static function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }
}
