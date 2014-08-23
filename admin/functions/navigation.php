<?php

function selected($value1, $value2, $return) {
    if ($value1 == $value2) {
        echo $return;
    }
}

function get_slug($dbc, $url) {
    $pos = strrpos($url, '/');
    $slug = substr($url, $pos + 1);
    
    return $slug;
}