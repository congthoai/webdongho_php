<?php
include_once 'P2SQL.php';

class orderModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function insertOrder($username, $name, $phone, $email, $address, $message){
        $query= 'select id from account where username=?';
        $id=  (int)P2SQL::getInstance()->executeReader($query,array($username));
        $query= "INSERT INTO `order` values (null, ?, 0, ?, curdate(), 0, ?, ?, ?)";
        $rs = P2SQL::getInstance()->executeNonQuery($query,array($id, $message, $phone, $email, $address));
        if($rs < 0) return false;
        return true;
    }
    
    public function insertOrder_Detail($watchID, $qty, $amount){
        $query= "select id from `order` order by id desc";
        $id=  (int)P2SQL::getInstance()->executeReader($query);
        $query= "INSERT INTO `order_detail` values (null, ?, ?, ?, ?)";
        $rs = P2SQL::getInstance()->executeNonQuery($query,array($id, $watchID, $qty, $amount));
        if($rs < 0) return false;
        return true;
    }
    
    public  function  getOrder_ChuaDuyet(){
        $query = "select o.*, a.username from `order` o join account a on o.account_id=a.id where status = 0";
        return P2SQL::getInstance()->executeQuery($query);
    }
    
    public  function  getOrder_DaDuyet(){
        $query = "select o.*, a.username from `order` o join account a on o.account_id=a.id where status = 1";
        return P2SQL::getInstance()->executeQuery($query);
    }
    
    public  function  getOrderbyUser($username){
        $query = "select o.*, a.username from `order` o join account a on o.account_id=a.id where a.username=?";
        return P2SQL::getInstance()->executeQuery($query,array($username));
    }
    
    public  function  getOrderDetailbyID($id){
        $query = "select o.*, a.name from `order` o join account a on o.account_id=a.id where o.id=?";
        return P2SQL::getInstance()->executeQuery($query,array($id));
    }
    
    
    public  function  getOrderDetail($id){
        $query = "select od.*,w.image_link, w.name, (w.price-w.discount) as price  from `order_detail` od join watch w on od.watch_id=w.id where order_id=?";
        return P2SQL::getInstance()->executeQuery($query,array($id));
    }
    
    public function xoaOrder($id){
        $query= 'DELETE FROM order_detail WHERE order_id=?';
        P2SQL::getInstance()->executeNonQuery($query, array($id));
        $query= 'DELETE FROM `order` WHERE id=?';
        return  P2SQL::getInstance()->executeNonQuery($query, array($id));
    }
    
    public function duyet_order($id){
        $query= "update `order` set status = 1 where id=?";
        $rs = P2SQL::getInstance()->executeNonQuery($query,array($id));
        if($rs < 0) return false;
        return true;
    }
    

}

?>