<?php

//error_reporting(0);

# Constants
define('ROOT', ''); // TODO: USE $_SERVER
define('DS', DIRECTORY_SEPARATOR);
require(ROOT . 'config' . DS . 'constants.php');

# Database Connection
require(ROOT . D_CONFIG . DS . 'connection.php');

# Functions
require(ROOT . D_FUNCTIONS . DS . 'data.php');

# Page
$page = isset($_GET['p']) ? $_GET['p'] : 'dashboard';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

# Site Settings
$settings = get_settings($dbc);
$site_title = $settings['site-title'];
$site_url = ''; // User DB URL
$debug_status = $settings['debug-status'];


# Queries
require(ROOT . D_CONFIG . DS . 'queries.php');
