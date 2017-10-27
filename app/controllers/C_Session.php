<?php

class C_Session extends Controller {

    public function action_index(){
        (new C_Main())->action_index();
    }

    public function action_login(){
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        if (!$login || !$pass){
            $this->redirect(M_Error::_ERROR_FIELD_EMPTY);
            return;
        }

        $result = (new M_Session())->login($login, $pass);
        $this->redirect($result);
    }

    public function action_registration(){
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        if (!$login || !$pass){
            $this->redirect(M_Error::_ERROR_FIELD_EMPTY);
            return;
        }

        $result = (new M_Session())->registration($login, $pass);
        $this->redirect($result);
    }

    public function action_exit(){
        $result = (new M_Session())->unlogin();
        $this->redirect($result);
    }

    private function redirect($result){
        if ($result === true) header('Location: ' . M_Session::_REDIRECT);
        else header('Location: ' . M_Session::_REDIRECT . '?error=' . $result);
    }

}