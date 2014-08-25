<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= ucfirst($url) . ' | ' . $site_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        require(D_CONFIG . '/css.php');
        require(D_CONFIG . '/js.php');
        ?>

    </head>
    <body>
        <?php
        require(D_TEMPLATE . '/header.php');
        