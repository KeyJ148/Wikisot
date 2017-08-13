<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/php/profile/auth.php");

$_REDIRECT = "/profile/";

$expire = time()-60*60*24*365*10;
$path = "/";
setcookie("login", "-1", $expire, $path);
setcookie("token", "-1", $expire, $path);

unset($_SESSION["login"]);

header("Location: " . $_REDIRECT);