<?php

class V_LinkList extends ViewSafe {

    public $content_list, $title_list;

    public function getText(){
        $this->view_text = '<div class="box"><h2>' . $this->title_list . '</h2><p>';

        for ($i = 0; $i < count($this->content_list) ; $i++){
            $this->view_text .= '<li><a href="' . $this->content_list[$i]['link'] . '">' . $this->content_list[$i]['name'] . '</a></li>';
        }

        $this->view_text .= '</p></div>';

        return $this->view_text;
    }
}
?>
