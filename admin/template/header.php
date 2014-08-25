<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ucfirst($page) . ' | ' . $site_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        require(D_CONFIG . '/css.php');
        require(D_CONFIG . '/js.php');
        ?>
    </head>
    <body>
        <div class="container">
            <?php
            include (D_TEMPLATE . '/messages.php');