<?php
session_start();
$_REDIRECT = "/profile/";

unset($_SESSION["login"]);
header("Location: " . $_REDIRECT);