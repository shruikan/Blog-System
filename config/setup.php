<?php

# Constants
DEFINE('D_TEMPLATE', 'template');
DEFINE('D_CONFIG', 'config');
DEFINE('D_FUNCTIONS', 'functions');
DEFINE('D_WIDGETS', 'widgets');

# Database Connection
include(D_CONFIG . '/connection.php');

# Functions
include(D_FUNCTIONS . '/data.php');
include(D_FUNCTIONS . '/navigation.php');

$path = get_path();
$site_title = 'Blog System';
$page = data_page($dbc, $path['call_parts'][0]);