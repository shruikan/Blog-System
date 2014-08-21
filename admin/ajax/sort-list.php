<?php

require ($_SERVER['DOCUMENT_ROOT'] . 'config' . DIRECTORY_SEPARATOR . 'connection.php');

$list = $_GET['list'];

foreach ($list as $position => $id) {
    $query = "UPDATE navigation SET position = $position WHERE id = $id";
    $result = mysqli_query($dbc, $query);
}