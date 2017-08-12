<div id="sidebar-button">
    <form action="/php/wiki/create_category.php" method="POST">
        <ul>
            <li><input class='text mini-text' type="text" name="name" placeholder="Название"></li>
            <li><input class='button mini-button' type="submit" value="Создать подстраницу"></li>
            <li><input class='text mini-text' type="text" name="category" value="<?php echo $_GET["p"]?>" hidden></li></li>
        </ul>
    </form>
</div>