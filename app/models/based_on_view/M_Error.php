<?php

class M_Error extends Model {

    const _ERROR_INTERNAL = 0;
    const _ERROR_NOT_PERMISSION = 1;
    const _ERROR_FIELD_EMPTY = 2;
    const _ERROR_NOT_LOGGED_IN = 3;
    const _ERROR_NAME_BUSY = 4;
    const _ERROR_CATEGORY_NOT_EXIST = 5;
    const _ERROR_AUTH = 6;
    const _ERROR_LOGIN_BUSY = 7;
    const _ERROR_LOGIN_SMALL = 8;
    const _ERROR_PASSWORD_SMALL = 9;
    const _ERROR_DELETE_SUBCATEGORIS = 10;
    const _ERROR_LOGIN_LARGE = 11;
    const _ERROR_PASSWORD_LARGE = 12;
    const _ERROR_LOGIN_SPEC_CHARS = 13;

    private $error;

    public function getData(){
        switch ($this->error){
            case M_Error::_ERROR_INTERNAL: return "внутренняя ошибка сервера";
            case M_Error::_ERROR_NOT_PERMISSION: return "недостаточно прав";
            case M_Error::_ERROR_FIELD_EMPTY: return "не заполнено одно из полей";
            case M_Error::_ERROR_NOT_LOGGED_IN: return "вы не авторизированы";
            case M_Error::_ERROR_NAME_BUSY: return "имя занято";
            case M_Error::_ERROR_CATEGORY_NOT_EXIST: return "категория не существует";
            case M_Error::_ERROR_AUTH: return "неверный логин или пароль";
            case M_Error::_ERROR_LOGIN_BUSY: return "логин занят";
            case M_Error::_ERROR_LOGIN_SMALL: return "логин должен быть длиннее 3 символов";
            case M_Error::_ERROR_PASSWORD_SMALL: return "пароль должен быть длиннее 6 символов";
            case M_Error::_ERROR_DELETE_SUBCATEGORIS: return "в начале удалите все подкатегории";
            case M_Error::_ERROR_LOGIN_LARGE: return "логин должен быть короче 25 символов";
            case M_Error::_ERROR_PASSWORD_LARGE: return "пароль должен быть короче 50 символов";
            case M_Error::_ERROR_LOGIN_SPEC_CHARS: return "логин должен состоять из латинских букв, цифр и знака подчеркивания";
        }
    }

    public function setError($error){
        $this->error = $error;
    }

    public function getErrorText($error){
        $this->setError($error);
        return $this->getData();
    }

}