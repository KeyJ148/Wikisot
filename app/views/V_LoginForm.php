<?php

class V_LoginForm extends ViewSafe{

    public $form_path, $text;

    public function getText(){
        $this->view_text = '
                <form action="' . $this->form_path . '" method="POST">
                    <ul>
                        <li><span class="form">Логин: </span><input class="text" type="text" name="login"></li>
                        <li><span class="form">Пароль: </span><input class="text" type="password" name="pass"></li>
                        <li><input class="button" type="submit" value="' . $this->text . '"></li>
                    </ul>
                </form>
                ';

        return $this->view_text;
    }
}
?>