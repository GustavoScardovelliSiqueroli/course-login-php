<?php

namespace app\controllers;

use \utils\ViewUtils;

final class MainPageController
{
    public static function renderMainPage(string $htmlName, array $vars = [])
    {
        $navBar = ViewUtils::render(
            'nav-bar',
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
}
