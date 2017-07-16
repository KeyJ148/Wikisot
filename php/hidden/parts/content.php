<?php
for ($i=0; $i<count($content); $i++){
    echo '<div class="box">';
    echo '<a name="topic_' . $i . '"></a>';

    if ($i == 0) {
        echo '<h2>' . $content[$i]["name"] . '</h2>';
    } else {
        echo '<h3>' . $content[$i]["name"] . '</h3>';
    }

    echo '<p>' . $content[$i]["text"] . '</p>';
    echo '</div>';
}