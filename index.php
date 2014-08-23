<?php

require('config/setup.php');
require(D_TEMPLATE . DIRECTORY_SEPARATOR . 'head.php');
if (!include (D_VIEWS . DIRECTORY_SEPARATOR . $url . '.php')) {
    include (D_VIEWS . DIRECTORY_SEPARATOR . '404.php');
}
require(D_TEMPLATE . DIRECTORY_SEPARATOR . 'footer.php');