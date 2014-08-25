<?php


if (isset($message['success'])) {

    foreach ($message['success'] as $m) {
        echo '<div class="alert alert-success">' . $m . '</div>';
    }
}
if (isset($message['warning'])) {

    foreach ($message['warning'] as $m) {
        echo '<div class="alert alert-warning">' . $m . '</div>';
    }
}