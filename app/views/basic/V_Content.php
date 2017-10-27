<?php

class V_Content extends View{

    public $content;

    public function display(){

        for ($i=0; $i<count($this->content); $i++){
        echo '<div class="box">';
            echo '<a name="' . M_ContentConstructor::$TOPIC_PREFIX . $i . '"></a>';

            if ($i == 0) {
                echo '<h2>' . $this->content[$i]['name'] . '</h2>';
            } else {
                echo '<h3>' . $this->content[$i]['name'] . '</h3>';
            }

            echo '<p>' . $this->content[$i]['text'] . '</p>';
            echo '</div>';
        }

    }
}
?>
