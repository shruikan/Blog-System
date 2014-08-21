<?php

session_start();
require('config/setup.php');

require(D_TEMPLATE . DS . 'header.php');

if (isset($_SESSION['username'])) {
    require(D_TEMPLATE . DS . 'navigation.php');
    require(D_VIEWS . DS . $page . '.php');
} else {
    require(D_VIEWS . DS . 'login.php');
}

require(D_TEMPLATE . DS . 'footer.php');
