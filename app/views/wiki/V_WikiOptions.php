<?php


class V_WikiOptions extends View{

    public $id;

    function display(){
        ?>

        <form action="<?= FORMS_PATH['page_create']?>" method="POST">
            <ul>
                <li><input class='text mini-text' type="text" name="name" placeholder="Название"></li>
                <li><input class='button mini-button' type="submit" value="Создать подстраницу"></li>
                <li><input class='text mini-text' type="text" name="category" value="<?= $this->id?>" hidden></li>
            </ul>
        </form>
        <form action="<?= FORMS_PATH['page_edit']?>" method="GET">
            <ul>
                <input class='button mini-button' type="submit" value="Изменить страницу">
                <input class='text mini-text' type="text" name="id" value="<?= $this->id?>" hidden>
            </ul>
        </form>
        <ul>
            <input id="delete-button" class='button mini-button red-button' type="submit" value="Удалить страницу">
        </ul>
        <div id="delete-answer" hidden>
            <ul>
                <li>Вы уверены?</li>
                <li>
                    <form action="<?= FORMS_PATH['page_delete'] ?>" method="POST" style="display: inline-block;">
                        <input class='button mini-button-2 red-button' type="submit" value="Да">
                        <input class='text mini-text' type="text" name="id" value="<?= $this->id?>" hidden>
                    </form>
                    <input id="delete-answer-no" class='button mini-button-2' type="submit" value="Нет">
                </li>
            </ul>
        </div>
        
        <?php
    }
}