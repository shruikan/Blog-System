<?php
session_start();

require('config/setup.php');
require(D_TEMPLATE. '/header.php');

if (isset($_SESSION['username'])) {
    require(D_TEMPLATE . '/navigation.php');
    require(D_VIEWS . '/' . $page . '.php');
} else {
    require(D_VIEWS . '/login.php');
}

require(D_TEMPLATE. '/footer.php');