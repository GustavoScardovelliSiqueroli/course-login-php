<?php

namespace app\models;

class TaskModel
{
    public string|null $idTask;
    public string|null $idUser;
    public string $title;
    public bool|null $done;

    public function __construct(
        string $idTask = null,
        string $idUser = null,
        string $title = null,
        bool $done = null
    ) {
        $this->idTask = $idTask;
        $this->idUser = $idUser;
        $this->title = $title;
        $this->done = $done;
    }

    public function getArray()
    {
        return array("idTask" => $this->idTask,"idUser"=>$this->idUser, "title" => $this->title, "done" => $this->done);
    }
}
