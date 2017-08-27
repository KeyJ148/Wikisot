<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/php/profile/auth.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/connect_db.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/errors.php");

$_REDIRECT = "/wiki/";

$name = $_POST["name"];
$page_id = $_POST["id"];
$content = $_POST["content"];
$category = $_POST["category"];
$_REDIRECT = $_REDIRECT . "?id=" . $page_id;
if (!isset($page_id) || !$name || !$category){
    header("Location: " . $_REDIRECT . "&edit=1&error=" . Errors::$_ERROR_FIELD_EMPTY);
    exit;
}

if (!isset($_SESSION["login"])){
    header("Location: " . $_REDIRECT . "&edit=1&error=" . Errors::$_ERROR_NOT_LOGGED_IN);
    exit;
}

$db = connect_db();
$login = $_SESSION["login"];
$result = mysqli_query($db, "SELECT * FROM users WHERE (login='$login')");
$result = mysqli_fetch_assoc($result);

$last_change = date("d.m.y G:i");
$last_change_user_id = $result["id"];

$role_id = $result["role_id"];
$result = mysqli_query($db, "SELECT * FROM roles WHERE (id='$role_id')");
$result = mysqli_fetch_assoc($result);
if ($result["change_pages"] == 0){
    header("Location: " . $_REDIRECT . "&edit=1&error=" . Errors::$_ERROR_NOT_PERMISSION);
    exit;
}

$result = mysqli_query($db, "SELECT * FROM pages WHERE (name='$name')");
$count = mysqli_num_rows($result);
$result = mysqli_fetch_assoc($result);
if ($count != 0 && $result["id"] != $page_id){
    header("Location: " . $_REDIRECT . "&edit=1&error=" . Errors::$_ERROR_NAME_BUSY);
    exit;
}

$result = mysqli_query($db, "SELECT * FROM pages WHERE (name='$category')");
if (mysqli_num_rows($result) == 0 && $category != "Без категории"){
    header("Location: " . $_REDIRECT . "&edit=1&error=" . Errors::$_ERROR_CATEGORY_NOT_EXIST);
    exit;
}

if (mysqli_num_rows($result) != 0) {
    $result = mysqli_fetch_assoc($result);
    $category_id = $result["id"];
}else {
    $category_id = -1;
}

mysqli_query($db, "UPDATE pages SET 
                   content='$content', 
                   name='$name', 
                   category_id='$category_id', 
                   last_change='$last_change', 
                   last_change_user_id='$last_change_user_id' 
                   WHERE (id='$page_id')");

header("Location: " . $_REDIRECT);