<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo ucfirst($url) . ' | ' . $site_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require(D_CONFIG . DS . 'css.php'); ?>

    </head>
    <body>
        <?php
        require(D_TEMPLATE . DS . 'header.php');
        