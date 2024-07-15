<?php

namespace app\controllers;

use app\controllers\MainPageController;

final class TaskController
{

    public static function homeTaks(){
        return MainPageController::renderMainPage('tasks');

    }
}
