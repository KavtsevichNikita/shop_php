<?php
    include_once 'connection.php';
    session_start();
    if (isset($_POST['id'])) {
        if (mysqli_query($mysqli, "INSERT INTO bascket(username, item_id) VALUES ('{$_SESSION['username']}',{$_POST['id']})")) {
            header('location: index.php');
        } else {
            die(mysqli_error($mysqli));
            header('location: error.php');
        }
    }
?>