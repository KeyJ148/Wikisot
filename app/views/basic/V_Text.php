<?php


class V_Text extends ViewSafe {

    public $text;

    public function getText(){
        $this->view_text = $this->text;
        return $this->view_text;
    }
}