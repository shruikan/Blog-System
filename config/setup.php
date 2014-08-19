<?php

# Constants
include('config/constants.php');

# Database Connection
include(D_CONFIG . '/connection.php');

# Functions
include(D_FUNCTIONS . '/data.php');
include(D_FUNCTIONS . '/navigation.php');

$path = get_path();

if(!isset($path['call_parts'][0]) || empty($path['call_parts'][0])) {
    $path['call_parts'][0] = 'home';
}

$site_title = 'Blog System';
$page = data_page($dbc, $path['call_parts'][0]);