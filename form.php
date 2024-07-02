<?php

class GsssForm{
    private string $user;
    private string $password;

    public function __construct(string $user = null, string $password = null) {
        $this->user = $user;
        $this->password = $password;
    }
    
}