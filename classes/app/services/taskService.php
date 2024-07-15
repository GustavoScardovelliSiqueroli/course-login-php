<?php

namespace app\services;

use app\models\TaskModel;
use utils\ViewUtils;

final class TaskService
{
    public static function renderTaksUnit(array $arrayTaks)
    {
        $returnTasksRender = [];
        foreach ($arrayTaks as $key => $value) {
            $returnTasksRender[] = ViewUtils::render(
                'task-item',
                ["taskTitle" => $value["title"]]
            );
        }
        return implode(" ", $returnTasksRender);
    }
}
