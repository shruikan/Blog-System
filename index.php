<?php

session_start();

require('config/setup.php');
require(D_TEMPLATE . 'head.php');

if (!include (D_VIEWS . $url . '.php')) {
    include (D_VIEWS . '404.php');
    include (D_TEMPLATE . 'aside.php');
}

if (in_array($url, $aside)) {
    include (D_TEMPLATE . 'aside.php');
}

require(D_TEMPLATE . 'footer.php');
require (D_TEMPLATE . 'templates.php');
