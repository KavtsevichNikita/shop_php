<?php
    if ($result = mysqli_query($mysqli, "SELECT * FROM items")) {
        while( $row = $result->fetch_array() )
        {
            echo  <<<END
                
                    <div class="card">
                        <h3 class="title">{$row['title']}</h3>
                        <form action="add.php" method="POST">
                        <div class="img">
                        <img class="photo" src={$row['url_img']}>
                        </div>
                        <div class="price">
                        <p class="cost">{$row['cost']} \$</p>
                        </div>
                        <input class="hidden" type="text" name="id" value={$row['id']}>
                        <button class="add" type="submit" value="Добавить в корзину">Добавить в корзину</button>
                        </form>
                    </div>   
            END;
        }
    }
?>