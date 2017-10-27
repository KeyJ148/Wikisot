<?php


class M_ProfileAuth extends Model {

    public function getData(){
        $data['title'] = 'Профиль';
        $data['content_description'] = 'Мы рады снова вас видеть, ' . $_SESSION['login'] . '!';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $name = 'Ваш профиль';
        $text = 'В дальнейшем здесь появится ваша статистика и возможность редактировать профиль.';
        $content->addTopic($name, $text);

        $name = 'Выход';
        $unloginForm = new V_Button();
        $unloginForm->form_path = FORMS_PATH['unlogin'];
        $unloginForm->text = 'Выйти';
        $text = 'Чтобы разлогиниться с сайта, пожалуйста, нажмите кнопку ниже.' . $unloginForm->getText();
        $content->addTopic($name, $text);

        return $content->getData();
    }
}