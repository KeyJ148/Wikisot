<?php


class V_WikiOptions extends View{

    public $id;

    function display(){
        ?>

        <div id="sidebar-button">
            <form action="<?= FORMS_PATH['page_create']?>" method="POST">
                <ul>
                    <li><input class='text mini-text' type="text" name="name" placeholder="Название"></li>
                    <li><input class='button mini-button' type="submit" value="Создать подстраницу"></li>
                    <li><input class='text mini-text' type="text" name="category" value="<?= $this->id?>" hidden></li>
                </ul>
            </form>
        </div>
        <div id="sidebar-button">
            <form action="<?= FORMS_PATH['page_edit'] . '?id=' . $this->id?>" method="POST">
                <ul>
                    <li class='form'><input class='button mini-button' type="submit" value="Изменить страницу"></li>
                </ul>
            </form>
        </div>
        
        <?php
    }
}