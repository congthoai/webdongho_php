<?php
include_once 'P2SQL.php';

class slideModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    
    public function getListSlide(){
        $query= "select * from slide order by sort asc ";
        return  P2SQL::getInstance()->executeQuery($query);
    }
    
    public function xoaSlide($id){
        $query= 'DELETE FROM slide WHERE id=?';
        return P2SQL::getInstance()->executeNonQuery($query, array($id));
    }
    
    public function addSlide($name, $image_link, $link, $sort){
        $query= 'insert into slide values(null, ?, ?, ?, ?)';
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($name, $image_link, $link, $sort));
        if($rs < 0) return false;
        return true;
    }
    
    

}

?>