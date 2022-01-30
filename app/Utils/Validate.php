<?php

namespace App\Utils;

use App\Messages\Flash;

class Validate{

    public static function parseInt($value){
        return intval($value);
    }

    public static function existSession(){
        
        if($_SESSION['logado']){
            return true;
        } 

        if(is_null($_SESSION['logado'])){
            Flash::add('message-type', 'alert');
            Flash::add('message', 'voce nao esta logado');
            return false;
        }
    }
}