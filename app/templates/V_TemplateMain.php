<?php

class V_TemplateMain extends View{

    public $head, $error, $header, $sidebar, $content, $bottom, $footer;

    public function display(){
?>

        <!DOCTYPE html>
        <head>
            <?php $this->head->display(); ?>
        </head>
        <body>
        <div id="wrapper">
            <?php $this->error->display(); ?>
            <?php $this->header->display(); ?>
            <div id="page">
                <?php $this->sidebar->display(); ?>
                <div id="content">
                    <?php $this->content->display(); ?>
                    <br class="clearfix" />
                </div>
                <br class="clearfix" />
            </div>
            <?php $this->bottom->display(); ?>
        </div>
        <?php $this->footer->display(); ?>
        </body>
        </html>

<?php
    }
}
?>

