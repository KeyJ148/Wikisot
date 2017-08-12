<?php
$url = substr($_SERVER['PHP_SELF'], 0, stripos($_SERVER['PHP_SELF'], "/", 1)+1);

$menu[0]["url"] = "/";
$menu[0]["name"] = "Главная";

$menu[1]["url"] = "/download/";
$menu[1]["name"] = "Скачать";

$menu[2]["url"] = "/wiki/";
$menu[2]["name"] = "Wiki";

$menu[3]["url"] = "/players/";
$menu[3]["name"] = "Игроки";

$menu[4]["url"] = "/profile/";
$menu[4]["name"] = "Профиль";
?>

<?php
    if (isset($_GET["error"])) {
       include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/errors.php");
?>
        <div id="error">
            <?php echo ("Внимание: " . Errors::get_error_text($_GET["error"])  . "!") ?>
        </div>
<?php
    }
?>
<div id="header">

    <div id="menu">
        <ul>
            <?php
            for ($i=0; $i<count($menu); $i++){
                if ($menu[$i]["url"] === $url) echo '<li class="active">';
                else echo '<li>';

                echo '<a href="' . $menu[$i]["url"] . '">' . $menu[$i]["name"] . '</a></li>';
            }
            ?>
        </ul>
        <br class="clearfix" />
    </div>
    <div id="logo">
        <h1><a href="/">Storm<br>of time</a></h1>
    </div>
</div>