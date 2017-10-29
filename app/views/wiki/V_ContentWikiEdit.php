<?php

class V_ContentWikiEdit extends View {

    public $text, $name, $category, $all_categories, $id, $display_select;

    public function display(){
        ?>


        <div class="box">
            <ul>
                <input form="save" type="hidden" name="id" value="<?= $this->id?>">
                <input form="save" class="text" type="text" name="name" value="<?= $this->name ?>">

                <?php if ($this->display_select){ ?>
                <select form="save" class="button" name="category">
                    <option><?= $this->category ?></option>

                    <?php
                    for ($i=0; $i<count($this->all_categories); $i++){
                        if ($this->category !== $this->all_categories[$i]){
                            echo '<option>' . $this->all_categories[$i] . '</option>';
                        }
                    }

                    if ($this->category !== M_Wiki::DEFAULT_CATEGORY_NAME) {
                        echo '<option>' . M_Wiki::DEFAULT_CATEGORY_NAME . '</option>';
                    }
                    ?>
                </select>
                <?php } ?>

                <br><br>
                <textarea form="save" type="text" name="content" cols="80" rows="40" style="resize:vertical;"><?= $this->text?></textarea>
            </ul>
        </div>


        <?php
    }
}
?>
