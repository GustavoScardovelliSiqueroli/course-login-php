<?php

namespace app\controllers;

use app\controllers\MainPageController;
use app\services\TaskService;
use app\models\TaskModel;

final class TaskController
{

    public static function homeTaks($requestMethod)
    {

        $task1 = new TaskModel("adsasda", "teste");
        $task2 = new TaskModel("adsasda", "teste");
        $task3 = new TaskModel("adsasda", "teste");
        $task4 = new TaskModel("adsasda", "teste");
        $task5 = new TaskModel("adsasda", "teste");
        $taskasArrayMoc = [$task1->getArray(), $task2->getArray(), $task3->getArray(), $task4->getArray(), $task5->getArray()];

        if (MainPageController::isGET($requestMethod)) {
            return MainPageController::renderMainPage(
                'tasks',
                ["tasks" => TaskService::renderTaksUnit($taskasArrayMoc)]
            );
        }

        $taskService = new TaskService();
        print_r($_POST["task"]);
        $newTask = new TaskModel(title: $_POST["task"]);
        var_dump($newTask);
        exit;
        $taskService->save($newTask);

    }
}
