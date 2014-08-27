<?php

require ('../config/setup.php');

$id = $_GET['id'];

$query = "DELETE FROM posts WHERE id = $id";
$result = mysqli_query($dbc, $query);