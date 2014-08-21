<?php

require('config/setup.php');
require(D_TEMPLATE . DIRECTORY_SEPARATOR . 'header.php');
require (D_VIEWS . DIRECTORY_SEPARATOR . $url . '.php');
require(D_TEMPLATE . DIRECTORY_SEPARATOR . 'footer.php');
