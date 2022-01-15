<?php
namespace App\Utils;

class LoggedUser
{

    public static function add($user)
    {
        $_SESSION['LoggedUser'] = $user;
    }

    public static function get()
    {
        $user = $_SESSION['LoggedUser'];
        return $user;
    }
    
}
