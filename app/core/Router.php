<?php

class Router {

    const CONTROLLERS_FOLDER = ROOT_FOLDER . '/app/controllers/';
    const CONTROLLER_ERROR = CONTROLLER_PREFIX . 'Errors';
    const ACTION_404 = ACTION_PREFIX . '404';

    public function routing(){
        if (!isset($_GET['route']) || empty($_GET['route']) || strripos($_GET['route'], '..')){
            $controller_name = CONTROLLER_DEFAULT;
            $action = ACTION_DEFAULT;
        } else {
            $parts = explode('/', $_GET['route']);
            $controller_name = CONTROLLER_PREFIX . mb_convert_case($parts[0], MB_CASE_TITLE, "UTF-8");;
            $action = (count($parts) > 1)? (ACTION_PREFIX . $parts[1]) : ACTION_DEFAULT;
        }

        $controller_path = Router::CONTROLLERS_FOLDER . $controller_name . '.php';
        if (!file_exists($controller_path)){
            $controller_name = Router::CONTROLLER_ERROR;
            $action = Router::ACTION_404;
        }

        $controller = new $controller_name();

        if (!method_exists($controller, $action)) $action = ACTION_DEFAULT;
        $controller->$action();
    }
}