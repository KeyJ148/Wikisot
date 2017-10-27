<?php

class V_ContentWiki extends ViewSafe {

    public $text, $name, $linkList;

    public function getText(){
        $this->view_text = '';
        if (count($this->linkList->content_list) !== 0) $this->view_text .= $this->linkList->getText();


        $this->view_text .= '

        <div class="box">
            <h2>'. $this->name .'</h2>
            <p>
                '. $this->text .'
            </p>
        </div>
        
        ';

        return $this->view_text;
    }
}
?>
