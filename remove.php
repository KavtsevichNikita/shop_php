<?php
    include 'connection.php';
    session_start();
    if (isset($_POST['id'])) {
        if (
            $result = mysqli_query($mysqli, "DELETE FROM bascket WHERE username = '{$_SESSION['username']}' AND item_id = {$_POST['id']}")
        ) {
            header('location: basket.php');
        } else {    
            header('location: error.php');
        }
        exit();
    }
?>