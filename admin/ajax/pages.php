<?php

require ('../../config/connection.php');

$id = $_GET['id'];
$query = "DELETE FROM pages WHERE id = $id";
$result = mysqli_query($dbc, $query);

if($result) {
    echo 'Page Deleted';
} else {
    echo 'Error!<br>';
    echo $query;
}