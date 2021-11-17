<?php
    if (isset($_POST['title']) && isset($_POST['cost']) && isset($_POST['url_img'])) {
        include 'connection.php';
        if ($result = mysqli_query($mysqli, "INSERT INTO items(title, cost, url_img) VALUES('{$_POST['title']}', {$_POST['cost']}, '{$_POST['url_img']}')")) {
            header('location: admin.php');
        } else {
            header('location: error.php');
        }
        exit();
    }
?>