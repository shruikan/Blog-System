<?php
session_start();

require('config/setup.php');
require(D_TEMPLATE . DS . 'head.php');

if (!include (D_VIEWS . DS . $url . '.php')) {
    include (D_VIEWS . DS . '404.php');
    include (D_TEMPLATE . DS . 'aside.php');
}

if(in_array($url, $aside)) {
    include (D_TEMPLATE . DS . 'aside.php');
}

require(D_TEMPLATE . DS . 'footer.php');