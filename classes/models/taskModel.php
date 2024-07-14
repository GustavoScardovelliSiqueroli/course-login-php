<?php
class UserModel
{
    public string|null $id;
    public string $title;
    public bool $done;

    public function __construct(
        string $id = null,
        string $title = null,
        bool $done = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->done = $done;
    }
}
