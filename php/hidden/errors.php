<?php

class Errors {

    public static $_ERROR_INTERNAL = 0;
    public static $_ERROR_NOT_PERMISSION = 1;
    public static $_ERROR_FIELD_EMPTY = 2;
    public static $_ERROR_NOT_LOGGED_IN = 3;
    public static $_ERROR_NAME_BUSY = 4;
    public static $_ERROR_CATEGORY_NOT_EXIST = 5;
    public static $_ERROR_AUTH = 6;
    public static $_ERROR_LOGIN_BUSY = 7;
    public static $_ERROR_LOGIN_SMALL = 8;
    public static $_ERROR_PASSWORD_SMALL = 9;

    static function get_error_text($error){
        switch ($error){
            case Errors::$_ERROR_INTERNAL: return "внутренняя ошибка сервера";
            case Errors::$_ERROR_NOT_PERMISSION: return "недостаточно прав";
            case Errors::$_ERROR_FIELD_EMPTY: return "не заполнено одно из полей";
            case Errors::$_ERROR_NOT_LOGGED_IN: return "вы не авторизированы";
            case Errors::$_ERROR_NAME_BUSY: return "имя занято";
            case Errors::$_ERROR_CATEGORY_NOT_EXIST: return "категория не существует";
            case Errors::$_ERROR_AUTH: return "неверный логин или пароль";
            case Errors::$_ERROR_LOGIN_BUSY: return "логин занят";
            case Errors::$_ERROR_LOGIN_SMALL: return "логин должен быть длиннее 3 символов";
            case Errors::$_ERROR_PASSWORD_SMALL: return "пароль должен быть длиннее 6 символов";
        }
    }
}

