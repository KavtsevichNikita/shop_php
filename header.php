
<header class="header">
    <?php
        if ($_SESSION['username'] === 'admin') {
            echo '<a href="admin.php">Админка</a>';
        }
    ?>  
            <a href="index.php">Каталог ноутбуков</a>
            <a href="basket.php">Корзина</a>
            <a href="logout.php">Выйти</a>
    </header>