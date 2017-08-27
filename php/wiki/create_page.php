<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/php/profile/auth.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/connect_db.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/errors.php");

$_REDIRECT = "/wiki/";

$name = $_POST["name"];
$category_id = $_POST["category"];

if (!$name || !$category_id){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_FIELD_EMPTY);
    exit;
}

if (!isset($_SESSION["login"])){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_NOT_LOGGED_IN);
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
if ($result["add_categories"] == 0){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_NOT_PERMISSION);
    exit;
}

$result = mysqli_query($db, "SELECT * FROM pages WHERE (name='$name')");
if (mysqli_num_rows($result) != 0 || $name == "Без категории"){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_NAME_BUSY);
    exit;
}

mysqli_query($db, "INSERT INTO pages (content, name, category_id, last_change, last_change_user_id) 
                               values('', '$name', '$category_id', '$last_change', '$last_change_user_id')");

$result = mysqli_query($db, "SELECT * FROM pages WHERE (name='$name')");
$result = mysqli_fetch_assoc($result);

header("Location: " . $_REDIRECT . "?id=" . $result["id"]);