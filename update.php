<?php
    include 'connection.php';
    if (isset($_POST['id'])) {
        if ($result = mysqli_query($mysqli, "UPDATE items SET cost = {$_POST['cost']}, title = '{$_POST['title']}',url_img = '{$_POST['url_img']}' WHERE id = {$_POST['id']}")) {
            header('location: admin.php');
        } else {
            header('location: error.php');
        }
        exit();
    }
?>       