<div id="sidebar">
    <div id="navigation">
        <h3>Навигация</h3>
        <p>
            <?php echo $content_description ?>
        </p>
        <ul class="list">
            <?php
            for ($i=0; $i<count($content); $i++){
                if ($i == 0) {
                    echo '<li class="first">';
                } else {
                    echo '<li class="sidebar">';
                }
                echo '<a href="#topic_'.$i.'">' . $content[$i]["name"] . '</a></li>';
            }
            ?>
        </ul>
    </div>
</div>