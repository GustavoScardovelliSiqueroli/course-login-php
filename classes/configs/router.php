<?php

namespace configs;

use app\controllers\UserController;

class Router
{
    public static function mainRouter(): void
    {
        // Obtém o caminho da URL
        $request = $_GET['path'] ?? '';

        switch ($request) {
            case '':
            case '/':
                echo UserController::login(self::getMethod());
                break;

            case 'register':
            case 'register/':
                echo UserController::register();
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
