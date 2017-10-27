<?php

class V_Button extends ViewSafe{

    public $form_path, $text;

    public function getText(){
        $this->view_text = '
                <form action="' . $this->form_path . '" method="POST">
                     <ul>
                         <li><input class="button" type="submit" value="' . $this->text . '"></li>
                     </ul>
                </form>
                ';

        return $this->view_text;
    }
}
?>