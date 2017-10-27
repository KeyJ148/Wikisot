<?php


class M_ProfileNoAuth extends Model {

    public function getData(){
        $data['title'] = 'Профиль';
        $data['content_description'] = 'Добро пожаловать на наш сайт! Пожалуйста, зарегистрируйтесь или авторизируйтесь.';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $name = 'Вход';
        $loginForm = new V_LoginForm();
        $loginForm->form_path = FORMS_PATH['login'];
        $loginForm->text = 'Войти';
        $text = 'Чтобы войти на сайт, введите ваш логин и пароль.' . $loginForm->getText();
        $content->addTopic($name, $text);

        $name = 'Регистрация';
        $registrationForm = new V_LoginForm();
        $registrationForm->form_path = FORMS_PATH['registration'];
        $registrationForm->text = 'Регистрация';
        $text = 'Чтобы зарегистрироваться на сайте, введите ваш логин и пароль. Всего-то!<br>
                 После регистрации вы сможете сохранять свою статистику и сравнивать её со статистикой других игроков.'
                 . $registrationForm->getText();
        $content->addTopic($name, $text);

        return $content->getData();
    }
}