<?php
    $db_host = 'localhost:3307';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'shop_db';
    
    $mysqli = @new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db
    );
    
    if ($mysqli->connect_error) {
        echo 'Errno: '.$mysqli->connect_errno;
        echo '<br>';
        echo 'Error: '.$mysqli->connect_error;
        exit();
    }
    
    session_start();
?>