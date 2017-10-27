<?php


class V_WikiOptionsEdit extends View{

    function display(){
        ?>

        <div id="sidebar-button">
            <form id="save" action="<?=FORMS_PATH['page_save']?>" method="POST">
                <ul>
                    <li class='form'><input class='button mini-button' type="submit" value="Сохранить страницу"></li>
                </ul>
            </form>
        </div>
        
        <?php
    }
}