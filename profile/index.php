<?php
session_start();

$include_css[0] = "/styles/parts/input.css";
$title = "Профиль";

if (isset($_SESSION["login"])){
    include_once("profile_auth.php");
} else {
    include_once("profile_no_auth.php");
}

include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/template.php");
