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

$_SESSION["login"] = $result["login"];
header("Location: " . $_REDIRECT);