<?php

/**
 * Настройки путей
 */
//Доменное имя приложения
define('DOMAIN_SERVER', 'http://' . $_SERVER['HTTP_HOST']);
//Папка с back-end часть проекта
define('APP_FOLDER', ROOT_FOLDER . '/app/');
//url с файлами javascript
define('JS_URL', '/public/js/');
//url с файлами css
define('CSS_URL', '/public/css/');
//url с файлами images
define('IMG_URL', '/public/images/');
//Папка с файлами javascript
define('JS_FOLDER', ROOT_FOLDER . JS_URL);
//Папка с файлами css
define('CSS_FOLDER', ROOT_FOLDER . CSS_URL);
//папка с файлами images
define('IMG_FOLDER', ROOT_FOLDER . IMG_URL);

/**
 * Настройки базы данных
 */
//Хост базы данных
define('DB_HOST', 'localhost');
//Логин базы данных
define('DB_LOGIN', 'root');
//Пароль базы данных
define('DB_PASSWORD', '123456');
//Название базы данных
define('DB_NAME', 'wikisot');

/**
 * Настройки роутера
 */
//Префикс названия класса контроллера
define('CONTROLLER_PREFIX', 'C_');
//Префикс метода действия в контроллере
define('ACTION_PREFIX', 'action_');
//Контроллер по умолчанию
define('CONTROLLER_DEFAULT', CONTROLLER_PREFIX . 'Main');
//Действие по умолчанию
define("ACTION_DEFAULT", ACTION_PREFIX . 'index');

/**
 * Найстройка путей скриптов для форм
 */
const FORMS_PATH = array(
    'unlogin' => '/session/exit/',
    'login' => '/session/login/',
    'registration' => '/session/registration/',
    'page_create' => '/wiki/create/',
    'page_edit' => '/wiki/edit/',
    'page_save' => '/wiki/save/',
    'page_delete' => '/wiki/delete/',
    'page_view' => '/wiki/view/'
);