<?php include_once 'connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="./src/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./src/css/bootstrap-grid.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Магазин</title>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="main">
        <h2 style =>Каталог ноутбуков:</h2>
        <div class="catalog">
            <?php include 'catalog.php' ?>
        </div>
    </div>
</body>
</html>