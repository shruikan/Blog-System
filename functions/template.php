<?php

function main_nav($dbc) {
    $query = "SELECT * FROM pages";
    $result = mysqli_query($dbc, $query);

    while($nav = mysqli_fetch_assoc($result)) {
        echo "<li><a href='$nav[slug]'>$nav[label]</a></li>";
    }
}