<?php

namespace utils;

use Exception;

final class UtilsGS
{
    public static function uuidv4()
    {
        $data = random_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public static function validateFourChars(array $vars)
    {
        $response = [];
        foreach ($vars as $key => $value) {
            if (strlen($value) < 4) {
                $response[$key] = $value;
            }
        }

        return $response;
    }

    public static function isLoggedIn(){
        try{
            session_start();
            $userId = $_SESSION["user"]; 
            if(empty($userId)){
                return false;
            }
            return $userId;
        }
        catch(Exception $e){
            return false;
        }
    }

}
