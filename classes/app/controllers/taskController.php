<?php

namespace app\controllers;

use app\controllers\MainPageController;
use app\services\TaskService;
use app\models\TaskModel;

final class TaskController
{

    public static function homeTaks()
    {
        $task1 = new TaskModel("adsasda", "teste");
        $task2 = new TaskModel("adsasda", "teste");
        $taskasArrayMoc = [$task1->getArray(), $task2->getArray()];


        return MainPageController::renderMainPage(
            'tasks',
            ["tasks" => TaskService::renderTaksUnit($taskasArrayMoc)]
        );
    }
}
