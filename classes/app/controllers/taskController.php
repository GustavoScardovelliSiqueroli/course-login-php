<?php

namespace app\controllers;

use app\controllers\MainPageController;
use app\services\TaskService;
use app\models\TaskModel;

final class TaskController
{

    public static function homeTaks($requestMethod)
    {
        $taskService = new TaskService();

        
        session_start();
        $resultQuery = $taskService->getAll($_SESSION["user"]);
        foreach ($resultQuery as $value) {
            foreach (($value->getArray()) as $key => $value) {
                echo "{$key} = {$value} <br>";
            };
            echo "<br>";
        }

        exit;

        if (MainPageController::isGET($requestMethod)) {
            return MainPageController::renderMainPage(
                'tasks',
                // ["tasks" => TaskService::renderTaksUnit($tasksInDB)]
            );
        }

        print_r($_POST["task"]);
        $newTask = new TaskModel(title: $_POST["task"]);
        $taskService->save($newTask);

    }
}
