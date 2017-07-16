<?php session_start(); ?>

<?php
$include_css[0] = "/styles/parts/input.css";
$title = "Профиль";

if (isset($_SESSION["login"])){
    include("profile_auth.php");
} else {
    include("profile_no_auth.php");
}

include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/template.php");
?>
