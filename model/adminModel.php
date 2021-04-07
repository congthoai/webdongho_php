<?php
include_once 'P2SQL.php';

class adminModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    
//     public function getListAdmin(){
//         $query= 'select id, name, username, email, phone from account where type_id=1';
//         return P2SQL::getInstance()->executeQuery($query);

//     }

    public function xoaAdmin($id){
        $query= 'DELETE FROM account WHERE id=?';
        return P2SQL::getInstance()->executeNonQuery($query, array($id));
    }
    
    public function getUsername($id){
        $query= 'select username from account where id=?';
        return P2SQL::getInstance()->executeReader($query, array($id));
    }
    
    public function getName($username){
        $query= 'select name from account where username=?';
        return P2SQL::getInstance()->executeReader($query, array($username));
    }
    
    public function getAdmin($id){
        $query= 'select name, username, email, phone, password from account where id=?';
        $rs = P2SQL::getInstance()->executeQuery($query, array($id));
        return $rs;
    }
    
    public function emailValid($string)
    {
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string))
            return true;
    } 
    
    public function updateAdmin($name, $pass, $phone, $email, $username){
        $query= 'update account set name=?, password=?, phone=?, email=? where username=?';
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($name, $pass, $phone, $email, $username));
        if($rs < 0) return false;
        return true;
    }
    
    
    public function addAdmin($name, $username, $pass, $phone, $email){
        $query= 'INSERT into account VALUES(null,1,?,?,?,?,?)';
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($name, $username, $pass, $phone, $email));
        if($rs < 0) return false;
        return true;
    }
    
    public function getTongSoLuong(){
        $query= 'select count(*) from account where type_id=1';
        return  P2SQL::getInstance()->executeReader($query);
    }
    
    public function getListAdmin($page, $limit){
        $page = ($page-1)*$limit;
        $query= 'select * from account where type_id=1 limit ?,?';
        return  P2SQL::getInstance()->executeQuery($query,array($page, $limit));
    }
    
}

?>