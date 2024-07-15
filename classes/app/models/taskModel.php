<?php

namespace app\models;

class TaskModel
{
    public string|null $id;
    public string $title;
    public bool|null $done;

    public function __construct(
        string $id = null,
        string $title = null,
        bool $done = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->done = $done;
    }

    public function getArray()
    {
        return array("id" => $this->id, "title" => $this->title, "done" => $this->done);
    }
}
