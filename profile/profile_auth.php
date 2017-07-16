<?php
$content_description = "Мы рады снова вас видеть, " . $_SESSION["login"] . "!";

$content[0]["name"] = "Ваш профиль";
$content[0]["text"] = "В дальнейшем здесь появится ваша статистика и возможность редактировать профиль.";

$content[1]["name"] = "Выход";
$content[1]["text"] = "
Чтобы разлогиниться с сайта, пожалуйста, нажмите кнопку ниже.
<form action=\"/php/profile/exit.php\" method=\"POST\">
    <ul>
        <li><input class='button' type=\"submit\" value=\"Выйти\"></li>
    </ul>
</form>
";