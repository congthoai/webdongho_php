<?php 
session_start();

    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    
    include_once '../views/layout/cart_content.php';
?>