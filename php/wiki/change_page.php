<?php
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/connect_db.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/errors.php");

$_REDIRECT = "/wiki/";

$name = $_POST["name"];
$path = $_POST["path"];
$content = $_POST["content"];
$category = $_POST["category"];
$_REDIRECT = $_REDIRECT . "?p=" . $name;
if (!$path || !$name || !$category){
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
if ($count != 0 && $result["name"] != $path){
    header("Location: " . $_REDIRECT . "&edit=1&error=" . Errors::$_ERROR_NAME_BUSY);
    exit;
}

$result = mysqli_query($db, "SELECT * FROM pages WHERE (name='$category')");
$result_2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM pages WHERE (name='$path')"));
if (mysqli_num_rows($result) == 0 && $result_2["category"] == 0){
    header("Location: " . $_REDIRECT . "&edit=1&error=" . Errors::$_ERROR_CATEGORY_NOT_EXIST);
    exit;
}

if (mysqli_num_rows($result) != 0) {
    $result = mysqli_fetch_assoc($result);
    $category_id = $result["id"];
}else {
    $category_id = -1;
}
mysqli_query($db, "UPDATE pages SET content='$content', name='$name', category_id='$category_id' WHERE (name='$path')");
header("Location: " . $_REDIRECT);