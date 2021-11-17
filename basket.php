<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Корзина</title>
</head>
<body>
    <?php include 'connection.php'?>
    <?php include 'header.php'?>

    <?php
        if ($result = mysqli_query(
            $mysqli, 
            "SELECT SUM(cost) as cost FROM items " .
            "JOIN bascket ON items.id = bascket.item_id " .
            "WHERE bascket.username = '{$_SESSION['username']}'"
        )) {
            $cost = mysqli_fetch_assoc($result)['cost'];
            if (!$cost) $cost = 0;
            echo "<h2>Total : $cost $</h2>";
        }

        if ($result = mysqli_query(
            $mysqli, 
            "SELECT items.title, items.url_img, items.id, items.cost FROM items " .
            "JOIN bascket ON items.id = bascket.item_id " .
            "WHERE bascket.username = '{$_SESSION['username']}'"
        )) {
            echo '<div class="bascket-container">';
            while( $row = $result->fetch_array() )
            {
                echo  <<<END
                    <div class="card">
                        <h3 class="title">{$row['title']}</h3>
                        <img class="photo" src="{$row['url_img']}">
                        <p class="cost">\${$row['cost']}</p>
                        <form action="remove.php" method="POST">
                        <input class="hidden" type="text" name="id" value={$row['id']}>
                        <div class="buttons">
                        <button class="delete_from" type="submit" value="Удалить из корзины">Удалить из корзины</button>
                        </div>
                        </form>
                    </div>    
                END;
            }
            echo '</div>';
        }
    ?>
</body>
</html>