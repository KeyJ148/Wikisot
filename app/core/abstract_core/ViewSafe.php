<?php

abstract class ViewSafe extends View {

    protected $view_text;

    abstract function getText();

    public function display(){
        echo $this->getText();
    }

    public function __toString(){
        return $this->getText();
    }
}