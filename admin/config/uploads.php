<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$ds = DIRECTORY_SEPARATOR;

include ($root . 'config' . $ds . 'connection.php');

$storeFolder = '../../uploads';
$id = $_GET['id'];

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$newname = time();
$random = rand(100, 999);
$name = $newname . $random . '.' . $ext;

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
    
    $deleteFile = $targetPath.$old['avatar'];
    
    if(!empty($old['avatar']) && !is_dir($deleteFile)) {
        unlink($deleteFile);
    }
}