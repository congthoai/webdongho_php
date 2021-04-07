<?php
include_once 'P2SQL.php';

class watchModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function getThuongHieu(){
        $query= 'select id,name from brand';
        $rs=  P2SQL::getInstance()->executeQuery($query);
        return $rs;
    }
    
    public function getWatch($id){
        $query= 'select * from watch where id=?';
        $rs=  P2SQL::getInstance()->executeQuery($query,array($id));
        return $rs;
    }
    
    public function getBrand($id){
        $query= 'select * from brand where id=?';
        $rs=  P2SQL::getInstance()->executeQuery($query,array($id));
        return $rs;
    }
    
    
    public function getLoaiDongHo(){
        $query= 'select id,name from typeofwatch';
        $rs=  P2SQL::getInstance()->executeQuery($query);
        return $rs;
    }
    
    public function getListWatch($page, $limit){
        $page = ($page-1)*$limit;
        $query= 'select * from watch LIMIT ?, ?';
        return  P2SQL::getInstance()->executeQuery($query,array($page, $limit));
    }
    
    public function getListTypeWatch(){
        $page = ($page-1)*$limit;
        $query= 'select * from typeofwatch';
        return  P2SQL::getInstance()->executeQuery($query);
    }
    
    public function getListBrand($page, $limit){
        $page = ($page-1)*$limit;
        $query= 'select * from brand LIMIT ?, ?';
        return  P2SQL::getInstance()->executeQuery($query,array($page, $limit));
    }
    
    public function getTongSoLuong(){
        $query= 'select count(*) from watch';
        return  P2SQL::getInstance()->executeReader($query);
    }
    
    public function getTongSoLuong_Brand(){
        $query= 'select count(*) from brand';
        return  P2SQL::getInstance()->executeReader($query);
    }
    
    
    public function sp_Loc_SP($id, $name, $brand, $page, $limit){
        $page = ($page-1)*$limit;
        $query= 'call sp_Loc_SP(?,?,?,?,?)';
        return  P2SQL::getInstance()->executeQuery($query,array($id,$name,$brand, $page, $limit));
    }
    
    public function sp_get_TongSP($id, $name, $brand){
        $query= 'call sp_get_TongSP(?,?,?)';
        return  P2SQL::getInstance()->executeReader($query,array($id,$name,$brand));
    }

    public function xoaWatch($id){
        $query= 'DELETE FROM watch WHERE id=?';
        return P2SQL::getInstance()->executeNonQuery($query, array($id));
    }
    
    public function xoaBrand($id){
        $query= 'DELETE FROM brand WHERE id=?';
        return P2SQL::getInstance()->executeNonQuery($query, array($id));
    }
    
    public function checkNameBrand($name){
        $query= 'select * from brand where name=?';
        $rs=  P2SQL::getInstance()->executeReader($query,array($name));
        if($rs=="") return false;
        return true;
    }
    
    public function checkNameWatch($name){
        $query= 'select * from watch where name=?';
        $rs=  P2SQL::getInstance()->executeReader($query,array($name));
        if($rs=="") return false;
        return true;
    }
    
    public function addBrand($name, $place, $descrip){
        $query= 'INSERT into brand VALUES (null, ?, ?, ?)';       
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($name, $place, $descrip));
        if($rs < 0) return false;
        return true;
    }
    
    public function updateBrand($name, $place, $descrip, $id){
        $query= 'update Brand set name=?, place=?, descrip=? where id=?';
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($name, $place, $descrip, $id));
        if($rs < 0) return false;
        return true;
    }
    
    public function addWatch($typewatch, $brand, $name, $gender, $price, $discount, $image, $warranty, $quantity, $size, $material, $waterproof){
        $query= "INSERT into watch VALUES (null, ?, ?, ?, ?, ?, ?, ?, 0, ?, 0, ?, ?,?, ? )";
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($typewatch , $brand, $name, $gender, $price, $discount, $image, $warranty, $quantity, $size,$material, $waterproof ));
        if($rs < 0) return false;
        return true;
    }
    
    public function updateWatch($typewatch, $brand, $name, $gender, $price, $discount, $image, $warranty, $quantity, $size, $material, $waterproof, $id){
        $query= "update watch set type_id=?, brand_id=?, name=?, gender=?, price=?, discount=?, image_link=?, warranty=?, quantity=?, size=?, material=?, waterproof=? where id=?";
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($typewatch , $brand, $name, $gender, $price, $discount, $image, $warranty, $quantity, $size,$material, $waterproof, $id ));
        if($rs < 0) return false;
        return true;
    }
    
    public function updateWatch2($typewatch, $brand, $name, $gender, $price, $discount,  $warranty, $quantity, $size, $material, $waterproof, $id){
        $query= "update watch set type_id=?, brand_id=?, name=?, gender=?, price=?, discount=?, warranty=?, quantity=?, size=?, material=?, waterproof=? where id=?";
        $rs= P2SQL::getInstance()->executeNonQuery($query,array($typewatch , $brand, $name, $gender, $price, $discount, $warranty, $quantity, $size,$material, $waterproof, $id ));
        if($rs < 0) return false;
        return true;
    }
    
    
}

?>