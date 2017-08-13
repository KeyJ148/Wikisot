<?php
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/connect_db.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/errors.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/profile/sault.php");

$_REDIRECT = "/profile/";

$login = $_POST["login"];
$pass = $_POST["pass"];
if (!$login || !$pass){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_FIELD_EMPTY);
    exit;
}

$login = mb_convert_case($login, MB_CASE_LOWER, "UTF-8");

$db = connect_db();
$result = mysqli_query($db, "SELECT * FROM users WHERE (login='$login')");
if (mysqli_num_rows($result) == 0){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_AUTH);
    exit;
}

$result = mysqli_fetch_assoc($result);
$hash = hash("SHA256", $pass . $result["sault"]);
if (strcmp($hash, $result["password"]) != 0){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_AUTH);
    exit;
}

$token = get_sault(64);
$expire = time()+60*60*24*365*10;
$path = "/";

setcookie("token", $token, $expire, $path);
setcookie("login", $login, $expire, $path);
$_SESSION["login"] = $result["login"];

mysqli_query($db, "UPDATE users SET token='$token' WHERE (login='$login')");

header("Location: " . $_REDIRECT);