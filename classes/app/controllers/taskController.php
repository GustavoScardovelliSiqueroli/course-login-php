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

        @session_start();
        @$resultQuery = $taskService->getAll($_SESSION["user"]);


        if (MainPageController::isGET($requestMethod)) {
            return MainPageController::renderMainPage(
                'tasks',
                ["tasks" => TaskService::renderTaksUnit($resultQuery)]
            );
        }
        if(isset($_POST["delete"])){
            $taskService->deleteByID($_POST["delete"]);
        }
        if(isset($_POST["update"])){
            $taskService->doTaks($_POST["update"]);
        }
        $newTask = new TaskModel(title: $_POST["task"]);
        $taskService->save($newTask);

    }
}
