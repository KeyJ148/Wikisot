<div class="box">
    <h2>Создать страницу</h2>
    <p>
        <form action="/php/wiki/create_category.php" method="POST">
            <ul>
                <li><span class='form'>Название: </span><input class='text' type="text" name="name"></li>
                <li>
                    <span class='form'>Категория:</span>
                    <select class="button" name="category">
                        <?php
                        $result = mysqli_query($db, "SELECT * FROM pages");
                        $count = mysqli_num_rows($result);

                        for ($i = 0; $i < $count ; $i++){
                            $row = mysqli_fetch_assoc($result);
                            echo '<option class="button">' . $row["name"] . '</option>';
                        }
                        ?>
                    </select>
                </li>
                <li><input class='button' type="submit" value="Создать страницу"></li>
            </ul>
        </form>
    </p>
</div>