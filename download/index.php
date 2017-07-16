<?php
$title = "Скачать игру";

$content_description = "На данной странице вы можете скачать игру или её движок, а также посмотреть проект на github.";

$content[0]["name"] = "Скачать игру";
$content[0]["text"] = "
Скачать игру можно по следующему адресу:
<a href=\"https://github.com/KeyJ148/RPG/archive/master.zip\">Zip-file</a><br>
Ссылка на страницу github игры:
<a href=\"https://github.com/KeyJ148/RPG\">Github</a>
";

$content[1]["name"] = "Скачать движок";
$content[1]["text"] = "
Скачать движок игры можно по следующему адресу:
<a href=\"https://github.com/KeyJ148/Engine/archive/master.zip\">Zip-file</a><br>
Ссылка на страницу github движка игры:
<a href=\"https://github.com/KeyJ148/RPG\">Github</a>
";

include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/template.php");