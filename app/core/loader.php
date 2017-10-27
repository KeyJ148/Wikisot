<?php
session_start();

require_once ROOT_FOLDER.'/app/core/config.php';
require_once ROOT_FOLDER.'/app/core/functions.php';

M_Session::authToken();

$router = new Router();
$router->routing();