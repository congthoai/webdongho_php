<?php
include_once 'P2SQL.php';

class commentModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    

    
    public  function  getComment(){
        $query = "select c.*, a.username, w.name from `comment` c join account a on c.account_id=a.id join watch w on c.watch_id=w.id where a.type_id=2 order by created desc limit 20";
        return P2SQL::getInstance()->executeQuery($query);
    }
    
   
    
    public function xoaComment($id){
        $query= 'DELETE FROM `comment` WHERE id=?';
        return P2SQL::getInstance()->executeNonQuery($query, array($id));
    }

}

?>