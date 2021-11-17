<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<?php
    if (isset($_GET['username']) && !isset($_SESSION['username'])) { 
        session_start();
        include 'connection.php';
        $result = mysqli_query($mysqli, "SELECT * FROM users where username = '{$_GET['username']}'");
        if ($result && mysqli_num_rows($result) === 0) {
            mysqli_query($mysqli, "INSERT INTO users(username) VALUES('{$_GET['username']}')");
        }
        $_SESSION['username'] = $_GET['username'];
        header('location: index.php');
        exit();
    }
?>
<body>
    <form action="login.php" method="GET">
        <div class="autorization">
        <h1>Авторизация</h1>
    <label>Введите имя!</label><br>
    <input type="text" name="username" min="1"><br>
    <button class="login" type="submit" value="Войти">Войти</button>
    </div>
</form>
</body>
</html>