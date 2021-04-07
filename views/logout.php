<?php
    session_start();
    session_unset();
    session_destroy();

    header('Location: http://localhost/webdongho_php/views/home.php');
?>