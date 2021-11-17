<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Админка</title>
</head>
<body>
    <?php
        $is_update = false;
        if (isset($_POST['id']) && $_POST['action'] === 'Удалить') {
            header('location: delete.php');
            exit();
        }

        
        if (isset($_POST['id']) && $_POST['action'] === 'Обновить') {
            $is_update = true;
        }
    ?>
    <?php include 'connection.php' ?>
    <?php include 'header.php' ?>
    <main class="admin-main">
        <section class="form-container">
            <?php

            if ($is_update && $result = mysqli_query($mysqli, "SELECT id, title, cost, url_img FROM items WHERE id = {$_POST['id']}")) {
                $data = mysqli_fetch_assoc($result);
                echo <<<END
                    <form action="update.php" method="POST" class="admin-form">
                        <label>
                            <input class="hidden" type="text" name="id" minlength="1" value="{$data['id']}" required>
                        </label> 
                        <label>
                            Title
                            <input type="text" name="title" min="1" value="{$data['title']}" required>
                        </label>
                        <label>
                            Cost
                            <input type="number" name="cost" min="1"  value="{$data['cost']}" required>
                        </label>
                        <label>
                            URL
                            <input type="text" name="url_img" min="1"  value="{$data['url_img']}" required>
                        </label>

                        <input type="submit" name="action" value="Обновить">
                    </form>
                END; 
            } else {
                echo <<<END
                    <form action="create.php" method="POST" class="admin-form">
                        <label>
                            Title
                            <input type="text" name="title" min="1">
                        </label>
                        <label>
                            Cost
                            <input type="number" name="cost" min="1">
                        </label>
                        <label>
                            URL
                            <input type="text" name="url_img" min="1">
                        </label>
                        <input type="submit" name="action" value="Создать">
                    </form>
                END;
            }
            ?>
        </section>
        <section class="item-list">
        <?php
            if ($result = mysqli_query($mysqli, "SELECT * FROM items")) {
                while( $row = $result->fetch_array() )
                {
                    echo  <<<END
                        <div class="card">
                            <h3 class="title">{$row['title']}</h3>
                            <img class="photo" src="{$row['url_img']}">
                            <p class="cost">\${$row['cost']}</p>
                            <div class="buttons">
                            <form action="delete.php" method="POST">
                                <input class="hidden" type="text" name="id" value={$row['id']}>
                                <button type="submit" name="action" value="Удалить" class="delete">Удалить</button>       
                            </form> 
                            <form action="admin.php" method="POST">
                                <input class="hidden" type="text" name="id" value={$row['id']}>
                                <button type="submit" name="action" value="Обновить" class="update">Обновить</button>
                            </form>
                            </div>
                        </div>    
                    END;
                }
            }
        ?>
        </section>
    </main>
</body>
</html>