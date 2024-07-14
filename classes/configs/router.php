<?php

namespace configs;

use views\UserView;
class Router
{
    private static function after($string, $inthat)
    {
        if (!is_bool(strpos($inthat, $string)))
            return substr($inthat, strpos($inthat, $string) + strlen($string));
    }

    public static function mainRouter(): void
    {

        $request = $_SERVER['REQUEST_URI'];
        $resourceDir = '/../src/resources/templates/';
        $request = Router::after('/', (Router::after('/', $request)));

        switch ($request) {
            case '':
            case '/':
                echo UserView::login();
                break;

            default:
                http_response_code(404);
                // require dirname(__FILE__) . '/templates-errors/error-404.html';
                echo "<h1>Page not found!</h1>";
        }
    }
}
