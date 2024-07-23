<?php

namespace app\controllers;

use \utils\ViewUtils;
use \utils\UtilsGS;

final class MainPageController
{
    public static function renderMainPage(string $htmlName, array $vars = [])
    {
        @session_start();
        @$userId = UtilsGS::isLoggedIn();
        $navItem = ViewUtils::render('items\nav-items-desconected');
        if (!empty($userId)) {
            $navItem = ViewUtils::render('items\nav-items-connected');
        }

        $navBar = ViewUtils::render(
            'nav-bar',
            ["navState" => $navItem]
        );

        $footer = ViewUtils::render(
            'footer',
        );

        $content = ViewUtils::render(
            $htmlName,
            $vars
        );
        return ViewUtils::render(
            'page',
            ['content' => $content, 'navbar' => $navBar, 'footer' => $footer]
        );
    }

    public static function isGET($requestMethod)
    {
        if ($requestMethod == "GET") {
            return true;
        }
        return false;
    }
}
