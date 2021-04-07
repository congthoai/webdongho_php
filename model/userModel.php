<?php
include_once 'P2SQL.php';

class userModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    
//     public function getListUser(){
//         $query= 'select id, name, username, email, phone from account where type_id=2';
//         return P2SQL::getInstance()->executeQuery($query);

//     }
    
    
    public function xoaUser($id){
        $query= 'DELETE FROM account WHERE id=?';
        return P2SQL::getInstance()->executeNonQuery($query, array($id));
    }
    
    
    public function getUser($id){
        $query= 'select name, username, email, phone, password from account where id=?';
        $rs = P2SQL::getInstance()->executeQuery($query, array($id));
        return $rs;
    }
    
    public function emailValid($string)
    {
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string))
            return true;
    }
    
    public function updateUser($name, $pass, $phone, $email, $username){
        $query= 'update account set name=?, password=?, phone=?, email=? where username=?';
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($name, $pass, $phone, $email, $username));
        if($rs < 0) return false;
        return true;
    }
    
    public function getTongSoLuong(){
        $query= 'select count(*) from account where type_id=2';
        return  P2SQL::getInstance()->executeReader($query);
    }
    
    public function getListUser($page, $limit){
        $page = ($page-1)*$limit;
        $query= 'select * from account where type_id=2 limit ?,?';
        return  P2SQL::getInstance()->executeQuery($query,array($page, $limit));
    }
    
    
    
}

?>