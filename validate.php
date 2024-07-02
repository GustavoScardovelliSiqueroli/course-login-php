<?php
class GsssValidate
{
    private string $user;
    private string $password;

    public function __construct(string $user = null, string $password)
    {
        $this->user = trim($user, " ");
        $this->password = trim($password, " ");
    }

    public function validate()
    {
        $response = [];
        if (strlen($this->user) < 4) {
            $response[1] = 1;
        } 
        if (strlen($this->password) < 4) {
            $response[2] = 2;
        }
        
        return $response;
    }
}
