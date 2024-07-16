<?php

namespace app\services;

use app\models\TaskModel;
use utils\ViewUtils;
use configs\ConnectionDB;
use utils\UtilsGS;

final class TaskService
{

    private TaskModel|null $taskModel;
    private ConnectionDb $connectionDB;
    private string $dbTasktable = "tasks";

    public function __construct(TaskModel $taskModel = null, string|null  $dbTasktable = null)
    {
        $this->taskModel = $taskModel;
        $this->connectionDB = new ConnectionDB();
        if (!$dbTasktable == null) {
            $this->dbTasktable = $dbTasktable;
        }
    }

    public function save(TaskModel $taskModel){
        
        $this->taskModel = $taskModel;
        $utils = new UtilsGS();
        $pdoConnected = $this->connectionDB->connect();

        $query = "INSERT INTO {$this->dbTasktable} (id_task, title) VALUES (:id_task, :title)";
        $stmt = $pdoConnected->prepare($query);

        $newUUID = $utils->uuidv4();

        $stmt->bindParam(':id_task', $newUUID);
        $stmt->bindParam(':title', $this->taskModel->title);

        $stmt->execute();

        header("Location: ./tasks");
    }

    public function getAll(){
        
    }


    public static function renderTaksUnit(array $arrayTaks)
    {
        $returnTasksRender = [];
        foreach ($arrayTaks as $key => $value) {
            $returnTasksRender[] = ViewUtils::render(
                'items/task-item',
                ["taskTitle" => $value["title"]]
            );
        }
        return implode(" ", $returnTasksRender);
    }
}
