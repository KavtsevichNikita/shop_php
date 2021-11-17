<?php
    if (isset($_POST['id'])) {
        include 'connection.php';
        if ($result = mysqli_query($mysqli, "DELETE FROM items WHERE id = {$_POST['id']} LIMIT 1")) {
            header('location: admin.php');
        } else {
            header('location: error.php');
            die(mysqli_error($result));
        }
        exit();
    }
?> 