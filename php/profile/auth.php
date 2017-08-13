<?php
if(session_id() == '') session_start();
include_once($_SERVER["DOCUMENT_ROOT"] . "/php/hidden/connect_db.php");

if (isset($_COOKIE["token"]) && isset($_COOKIE["login"])) {
    $token = $_COOKIE["token"];
    $login = $_COOKIE["login"];

    $db = connect_db();
    $result = mysqli_query($db, "SELECT * FROM users WHERE (login='$login')");
    if (mysqli_num_rows($result) != 0) {
        $result = mysqli_fetch_assoc($result);
        if (strnatcasecmp($result["login"], $login) == 0 &&
            strnatcasecmp($result["token"], $token) == 0
        ) {
            $_SESSION["login"] = $result["login"];
        }
    }
}