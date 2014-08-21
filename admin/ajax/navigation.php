<?php

require ($_SERVER['DOCUMENT_ROOT'] . 'config' . DIRECTORY_SEPARATOR . 'connection.php');

$id = mysqli_real_escape_string($dbc, $_POST[id]);
$label = mysqli_real_escape_string($dbc, $_POST[label]);
$url = mysqli_real_escape_string($dbc, $_POST[url]);
$position = mysqli_real_escape_string($dbc, $_POST[position]);
$status = mysqli_real_escape_string($dbc, $_POST[status]);

$query = "UPDATE navigation SET id = '$id', label = '$label', url = '$url', status = $status WHERE id = '$_POST[openedid]'";
$result = mysqli_query($dbc, $query);

if ($result) {
    echo 'Saved';
} else {
    echo mysqli_error($dbc) . '<br>' . $q;
}