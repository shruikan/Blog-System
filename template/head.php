<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= ucfirst($url) . ' | ' . $site_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        require(D_CONFIG . 'css-local.php');
        require(D_CONFIG . 'js-local.php');
        ?>

    </head>
    <body>
        <?php
        require(D_TEMPLATE . 'header.php');
        