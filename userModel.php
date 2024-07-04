<?php
class UserModel
{
    public string|null $id;
    public string $name;
    public string $password;
    public string $email;

    public function __construct(
        string $id = null,
        string $name = null,
        string $password = null,
        string $email = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

}
