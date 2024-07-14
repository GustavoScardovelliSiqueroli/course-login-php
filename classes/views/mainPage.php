<?php

namespace views;

use \configs\ViewConfigs;

final class mainPage
{
    public static function renderMainPage(string $htmlName, array $vars = [])
    {
        $navBar = ViewConfigs::render(
            'nav-bar',
        );

        $footer = ViewConfigs::render(
            'footer',
        );

        $content = ViewConfigs::render(
            $htmlName,
            $vars
        );
        return ViewConfigs::render(
            'page',
            ['content' => $content, 'navbar' => $navBar, 'footer' => $footer]
        );
    }
}
