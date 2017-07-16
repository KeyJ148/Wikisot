<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/connect_db.php");
include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/errors.php");

$_REDIRECT = "/profile/";

$login = $_POST["login"];
$pass = $_POST["pass"];
if (!$login || !$pass){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_FIELD_EMPTY);
    exit;
}
if (strlen($login) < 3){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_LOGIN_SMALL);
    exit;
}
if (strlen($pass) < 6){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_PASSWORD_SMALL);
    exit;
}

$login = mb_convert_case($login, MB_CASE_LOWER, "UTF-8");
$sault = get_sault();
$hash = hash("SHA256", $pass . $sault);

$db = connect_db();
$result = mysqli_query($db, "SELECT * FROM users WHERE (login='$login')");
if (mysqli_num_rows($result) != 0){
    header("Location: " . $_REDIRECT . "?error=" . Errors::$_ERROR_LOGIN_BUSY);
    exit;
}

mysqli_query($db, "INSERT INTO users (login, password, sault) values('$login', '$hash', '$sault')");

$_SESSION["login"] = $login;
header("Location: " . $_REDIRECT);

function get_sault($length = 32){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $numChars = strlen($chars);
    $string = "";
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}