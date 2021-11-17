<?php 
    unset($_SESSION['username']);
    session_destroy();
    header('location: login.php');
    exit();
?>