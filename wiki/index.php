<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/php/profile/auth.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/connect_db.php");
$db = connect_db();

$_REDIRECT = "/wiki/";

$page = null;
if (isset($_GET["id"])){
    $page_id = $_GET["id"];
    $result = mysqli_query($db, "SELECT * FROM pages WHERE (id='$page_id')");
    $count = mysqli_num_rows($result);
    if ($count != 0){
        $page = mysqli_fetch_assoc($result);
    }
}

if ($page == null){
    header("Location: " . $_REDIRECT . "?id=0");
    exit;
}

$include_css[0] = "/styles/parts/input.css";
$title = "Wiki";
?>

<!DOCTYPE html>
<head>
    <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/head.php");?>
</head>
<body>
<div id="wrapper">
    <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/header.php") ?>
    <div id="page">
        <div id="sidebar">
        <?php include_once($_SERVER["DOCUMENT_ROOT"]."/wiki/sidebar/navigation.php") ?>
        <br>
        <?php

        if (isset($_GET["edit"]) && $_GET["edit"]) include_once($_SERVER["DOCUMENT_ROOT"] . "/wiki/sidebar/button_save.php");
        else if (isset($_SESSION["login"])){
            $login = $_SESSION["login"];
            $result = mysqli_query($db, "SELECT * FROM users WHERE (login='$login')");
            $result = mysqli_fetch_assoc($result);
            $role_id = $result["role_id"];
            $result = mysqli_query($db, "SELECT * FROM roles WHERE (id='$role_id')");
            $result = mysqli_fetch_assoc($result);
            if ($result["change_pages"] == 1){
                include_once($_SERVER["DOCUMENT_ROOT"] . "/wiki/sidebar/button_create.php");
                include_once($_SERVER["DOCUMENT_ROOT"] . "/wiki/sidebar/button_change.php");
            }
        }


        $last_change_user_id = $page["last_change_user_id"];
        $result = mysqli_query($db, "SELECT * FROM users WHERE (id='$last_change_user_id')");
        $result = mysqli_fetch_assoc($result);

        echo 'Последние изменение:<br>';
        echo $page["last_change"] . ", " . $result["visible_login"];

        ?>
        </div>
        <div id="content">
            <?php include_once($_SERVER["DOCUMENT_ROOT"]."/wiki/page_wiki.php"); ?>
            <br class="clearfix" />
        </div>
        <br class="clearfix" />
    </div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/bottom.php") ?>
</div>
<?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/footer.php") ?>
</body>
</html>