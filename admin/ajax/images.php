<?php
if (isset($_GET['id'])):

    require ('../config/link.php');

    $id = $_GET['id'];

    $query = "SELECT image FROM posts WHERE id = $id";
    $result = mysqli_query($dbc, $query);
    $data = mysqli_fetch_assoc($result);
    ?>

    <div class="image-container" style="background-image: url('../uploads/<?= $data['image']; ?>')"></div>
<?php endif; ?>