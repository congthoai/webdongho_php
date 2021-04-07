<?php
    if(!isset($_SESSION)) session_start();
    
    if(isset($_GET['id_add_cart']) && $_GET['id_add_cart'] !=null){
        $id = $_GET['id_add_cart'];
        if(isset($_SESSION['cart'][$id]))
        {
            $qty = $_SESSION['cart'][$id] + 1;
        }
        else
        {
            $qty=1;
        }
        $_SESSION['cart'][$id]=$qty;
    }

    if(isset($_SESSION['cart'])){
        $quantity = 0;
        foreach ($_SESSION['cart'] as $key => $val)
            $quantity += $val;
        echo $quantity;
    }
?>