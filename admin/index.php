<?php
session_start();

include('config/setup.php');
include(D_TEMPLATE. '/header.php');

if (isset($_SESSION['username'])) {
    require(D_TEMPLATE . '/navigation.php');
    include(D_VIEWS . '/' . $page . '.php');
} else {
    include(D_VIEWS . '/login.php');
}

include(D_TEMPLATE. '/footer.php');