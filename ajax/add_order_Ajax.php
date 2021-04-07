<?php 
session_start();
include_once '../model/orderModel.php';

    $username= $_SESSION['username'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address= $_POST['address'];
    $message = $_POST['message'];
    
    $rs = orderModel::getInstance()->insertOrder($username, $name, $phone, $email, $address, $message);
    
    if($rs){
        $listCart;
        foreach ($_SESSION['cart'] as $key=>$val)
            $listCart[]=$key;
            
        $in = implode(",", $listCart);
        $query = "select * from watch where id in ($in)";
        $list = P2SQL::getInstance()->executeQuery($query);
        
        foreach ($list as $cart){
            $price = (int)$cart['price'] - (int)$cart['discount'];
            $qty = $_SESSION['cart'][$cart['id']];
            $total_price = $qty*$price;
            
            orderModel::getInstance()->insertOrder_Detail( $cart['id'], (int)$qty, $total_price);          
        }
            
        
        echo "Đơn hàng của ban đã được tạo thành công, chờ duyệt!<br><strong>Xem đơn hàng</strong>";
        unset($_SESSION['cart']);
    }
    else 
        echo "Tạo đơn hàng không thành công!";

?>