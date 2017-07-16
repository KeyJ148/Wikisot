<?php
$content_description = "Добро пожаловать на наш сайт! Пожалуйста, зарегистрируйтесь или авторизируйтесь.";

$content[0]["name"] = "Вход";
$content[0]["text"] = "
Чтобы войти на сайт, введите ваш логин и пароль.
<form action=\"/php/profile/login.php\" method=\"POST\">
    <ul>
        <li><span class='form'>Логин: </span><input class='text' type=\"text\" name=\"login\"></li>
        <li><span class='form'>Пароль: </span><input class='text' type=\"password\" name=\"pass\"></li>
        <li><input class='button' type=\"submit\" value=\"Войти\"></li>
    </ul>
</form>
";

$content[1]["name"] = "Регистрация";
$content[1]["text"] = "
Чтобы зарегистрироваться на сайте, введите ваш логин и пароль. Всего-то!<br>
После регистрации вы сможете сохранять свою статистику и сравнивать её со статистикой других игроками.
<form action=\"/php/profile/registration.php\" method=\"POST\">
    <ul>
        <li><span class='form'>Логин: </span><input class='text' type=\"text\" name=\"login\"></li>
        <li><span class='form'>Пароль: </span><input class='text' type=\"password\" name=\"pass\"></li>
        <li><input class='button' type=\"submit\" value=\"Регистрация\"></li>
    </ul>
</form>
";
