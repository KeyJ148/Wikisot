<?php

class M_Session extends Model {

    const _REDIRECT = '/profile/';

    public function getData(){}

    //Попытка залогиниться с указанным логином и паролем
    //Возвращает true, если успешно, в противном случае случае возвращает номер ошибки
    public function login($login, $pass){
        $person = new ORM_Person();
        $person->db_login = $login;
        $find = $person->load();
        if (!$find) return M_Error::_ERROR_AUTH;

        $hash = hash('SHA256', $pass . $person->db_sault);
        if (strcmp($hash, $person->db_password) != 0) return M_Error::_ERROR_AUTH;

        $token = M_Session::getSault(64);
        M_Session::setCookie($person->db_login, $token);
        M_Session::authToken();
        $person->db_token = $token;
        $person->save();

        return true;
    }

    //Попытка зарегистрироваться с указанным логином и паролем
    //Возвращает true, если успешно, в противном случае случае возвращает номер ошибки
    public function registration($login, $pass){
        if (strlen($login) < 3) return M_Error::_ERROR_LOGIN_SMALL;
        if (strlen($pass) < 6) return M_Error::_ERROR_PASSWORD_SMALL;

        $sault = M_Session::getSault();
        $hash = hash('SHA256', $pass . $sault);

        $person = new ORM_Person();
        $person->db_login = $login;
        $find = $person->load();
        if ($find) return M_Error::_ERROR_LOGIN_BUSY;

        $token = M_Session::getSault(64);
        M_Session::setCookie($person->db_login, $token);
        M_Session::authToken();

        $person = ORM_Person::create();
        $person->db_login = $login;
        $person->db_password = $hash;
        $person->db_sault = $sault;
        $person->db_role_id = 0;
        $person->db_token = $token;
        $person->save();

        return true;
    }

    public function unlogin(){
        $expire = time()-60*60*24*365*10;
        $path = '/';
        setcookie('login', '-1', $expire, $path);
        setcookie('token', '-1', $expire, $path);

        unset($_SESSION['login']);
        return true;
    }

    public static function getSault($length = 32){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    //Устанавливает в куки указанный логин и токен
    public static function setCookie($login, $token){
        $expire = time()+60*60*24*365*10;
        $path = '/';

        setcookie('token', $token, $expire, $path);
        setcookie('login', $login, $expire, $path);
    }

    //Устанавливает значение $_SESSION['login'] по куки пользователя, если он был авторизирован
    public static function authToken(){
        if (isset($_COOKIE['token']) && isset($_COOKIE['login'])) {
            $token = $_COOKIE['token'];
            $login = $_COOKIE['login'];

            $person = new ORM_Person();
            $person->db_login = $login;

            if ($person->load() && strnatcasecmp($person->db_token, $token) == 0) {
                $_SESSION['login'] = $person->db_login;
            }
        }
    }

}