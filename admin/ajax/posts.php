<?php

require ('../config/connection.php');

$id = $_GET['id'];

$query = "DELETE FROM posts WHERE id = $id";
$result = mysqli_query($dbc, $query);

if ($result) {
    echo 'Post Deleted';
} else {
    echo 'Error!<br>';
    echo $query;
}