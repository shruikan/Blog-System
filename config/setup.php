<?php

# Constants
DEFINE('D_TEMPLATE', 'template');
DEFINE('D_CONFIG', 'config');
DEFINE('D_FUNCTIONS', 'functions');

# Database Connection
include(D_CONFIG . '/connection.php');

# Functions
include(D_FUNCTIONS . '/template.php');


$site_title = 'Blog System';