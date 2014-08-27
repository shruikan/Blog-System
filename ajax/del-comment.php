<?php

if (isset($_GET['id']) && isset($_GET['ajax'])) {
    require ('../config/setup.php');
    
    $id = $_GET['id'];

    $query = "DELETE FROM comments WHERE id = $id";
    $result = mysqli_query($dbc, $query);

    if ($result) {
        echo 'Post Deleted';
    } else {
        echo 'Error!<br>';
        echo $query;
    }
}