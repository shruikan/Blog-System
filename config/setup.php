<?php

# Constants
require('config/constants.php');

# Database Connection
require(D_CONFIG . '/connection.php');

# Functions
require(D_FUNCTIONS . '/data.php');
require(D_FUNCTIONS . '/navigation.php');

$path = get_path();

if(!isset($path['call_parts'][0]) || empty($path['call_parts'][0])) {
    $path['call_parts'][0] = 'home';
}

$page = data_page($dbc, $path['call_parts'][0]);