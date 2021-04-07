<?php
include_once 'P2SQL.php';

class loginModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    
    public function checkLogin($username, $pass){
        $query= 'select type_id from account where username=? and password=?';
        return P2SQL::getInstance()->executeReader($query,array($username,$pass));
        
    }

}

?>