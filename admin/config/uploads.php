<?php

$ds = DIRECTORY_SEPARATOR;

require ('../config/link.php');

$storeFolder = '../../uploads';
$id = $_GET['id'];

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$newname = time();
$random = rand(100, 999);
$name = $newname . $random . '.' . $ext;


if ($_GET['type'] == 'avatar') {

    $query = "SELECT avatar FROM users WHERE id = $id";
    $result = mysqli_query($dbc, $query);
    $old = mysqli_fetch_assoc($result);

    $query = "UPDATE users SET avatar = '$name' WHERE id = $id";
    $result = mysqli_query($dbc, $query);

    if (!empty($_FILES)) {

        $tempFile = $_FILES['file']['tmp_name'];
        $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
        $targetFile = $targetPath . $name;

        move_uploaded_file($tempFile, $targetFile);

        $deleteFile = $targetPath . $old['avatar'];

        if (!empty($old['avatar']) && !is_dir($deleteFile)) {
            unlink($deleteFile);
        }
    }
}
if ($_GET['type'] == 'image') {

    $query = "SELECT image FROM posts WHERE id = $id";
    $result = mysqli_query($dbc, $query);
    $old = mysqli_fetch_assoc($result);

    $query = "UPDATE posts SET image = '$name' WHERE id = $id";
    $result = mysqli_query($dbc, $query);

    if (!empty($_FILES)) {

        $tempFile = $_FILES['file']['tmp_name'];
        $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
        $targetFile = $targetPath . $name;

        move_uploaded_file($tempFile, $targetFile);

        $deleteFile = $targetPath . $old['image'];

        if (!empty($old['image']) && !is_dir($deleteFile)) {
            unlink($deleteFile);
        }
    }
}


