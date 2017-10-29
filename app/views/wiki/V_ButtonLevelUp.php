<?php

class V_ButtonLevelUp extends ViewSafe{

    public $form_path, $text, $id;

    public function getText(){
        $this->view_text = '
                <form action="' . $this->form_path . '" method="GET">
                     <ul>
                         <input class="button mini-button" type="submit" value="' . $this->text . '">
                         <input class="text mini-text" type="text" name="id" value="'. $this->id .'" hidden>
                     </ul>
                </form>
                ';

        return $this->view_text;
    }
}
?>