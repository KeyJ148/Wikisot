<div id="navigation">
    <div class="box">
        <h3>Навигация</h3>
        <ul class="list">
            <?php
            $result = mysqli_query($db, "SELECT * FROM pages WHERE (category_id='-1')");
            $count = mysqli_num_rows($result);

            for ($i = 0; $i < $count ; $i++){
                $row = mysqli_fetch_assoc($result);
                if ($i == 0) {
                    echo '<li class="first">';
                } else {
                    echo '<li class="sidebar">';
                }
                echo '<a href="/wiki/?p='.$row["name"].'">';
                echo $row["name"];
                echo '</a></li>';
            }
            ?>
        </ul>
    </div>
</div>