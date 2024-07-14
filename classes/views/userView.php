<?php

namespace views;
use \views\mainPage;

final class UserView
{
    public static function login()
    {
        return mainPage::renderMainPage('login',);
    }
}
