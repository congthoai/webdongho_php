<?php
include_once 'P2SQL.php';

class registerModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function checkUsername($username){
        $query= 'select * from account where username=?';
        $rs=  P2SQL::getInstance()->executeReader($query,array($username));
        if($rs=="") return false;
        return true;
    }

    public function addUser($name, $username, $pass, $phone, $email){
        $query= 'INSERT into account VALUES(null,2,?,?,?,?,?)';
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($name, $username, $pass, $phone, $email));
        if($rs < 0) return false;
        return true;
    }

    public function emailValid($string) 
    { 
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
            return true; 
    } 

}

?>