<?php

require ('../../config/connection.php');

$id = $_GET['id'];

$query = "SELECT avatar FROM users WHERE id = $id";
$result = mysqli_query($dbc, $query);
$data = mysqli_fetch_assoc($result);

?>

<div class="avatar-container" style="background-image: url('../uploads/<?php echo $data['avatar']; ?>')"></div>