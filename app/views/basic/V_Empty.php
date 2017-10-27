<?php

class V_Empty extends ViewSafe {

    function getText(){
        $this->view_text = '';
        return $this->view_text;
    }
}