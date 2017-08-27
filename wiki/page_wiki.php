<?php
$page_id = $_GET["id"];
$edit = isset($_GET["edit"]);
$result = mysqli_query($db, "SELECT * FROM pages WHERE (id='$page_id')");
$page = mysqli_fetch_assoc($result);
?>

<?php if (!$edit) { ?>
    <?php
    $result = mysqli_query($db, "SELECT * FROM pages WHERE (category_id='$page[id]')");
    $count = mysqli_num_rows($result);
    ?>
    <?php if ($count != 0){?>

        <div class="box">
            <h2>Страницы в этой категории</h2>
            <p>
                <?php
                for ($i = 0; $i < $count ; $i++){
                    $row = mysqli_fetch_assoc($result);
                    echo '<li><a href="/wiki/?id='.$row["id"].'">';
                    echo $row["name"];
                    echo '</a></li>';
                }
                ?>
            </p>
        </div>
    <?php }?>
    <div class="box">
        <h2><?php echo $page["name"] ?></h2>
        <p>
            <?php
            echo str_replace(chr(13), "<br>", $page["content"]);
            ?>
        </p>
    </div>
<?php } else {?>
    <div class="box">
            <ul>
                <input form="save" type="hidden" name="id" value="<?php echo $page_id?>">
                <input form="save" class="text" type="text" name="name" value="<?php echo $page["name"] ?>">
                <select form="save" class="button" name="category">
                    <?php
                    if ($page["category_id"] == -1) echo '<option>Без категории</option>';

                    $result = mysqli_query($db, "SELECT * FROM pages");
                    $count = mysqli_num_rows($result);
                    $now_category_id = $page["category_id"];
                    $now_category_name = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM pages WHERE (id='$now_category_id')"));
                    $now_category_name = $now_category_name["name"];

                    if ($page["category_id"] != -1) echo '<option>' . $now_category_name . '</option>';
                    for ($i = 0; $i < $count ; $i++){
                        $row = mysqli_fetch_assoc($result);
                        if ($row["name"] != $now_category_name){
                            echo '<option>' . $row["name"] . '</option>';
                        }
                    }

                    if ($page["category_id"] != -1) echo '<option>Без категории</option>';
                    ?>
                </select>
                <br><br>
                <textarea form="save" type="text" name="content" cols="80" rows="40" style="resize:vertical;"><?php echo $page["content"] ?></textarea>
            </ul>
    </div>
<?php }?>
