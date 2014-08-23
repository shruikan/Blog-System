<?php

//error_reporting(0);

# Constants
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
//define('ROOT', '');
define('DS', DIRECTORY_SEPARATOR);
require(ROOT . 'config' . DS . 'constants.php');

# Database Connection
require(ROOT . D_CONFIG . DS . 'connection.php');

# Functions
require(ROOT . D_FUNCTIONS . DS . 'data.php');
require(ROOT . D_FUNCTIONS . DS . 'navigation.php');

# Site Settings
$settings = get_settings($dbc);
$site_title = $settings['site-title'];
$site_url = $settings['site-url']; // User DB URL
$debug_status = $settings['debug-status'];

# Path
$path = get_path();
$url = $path['call_parts'][0];

require(ROOT . D_CONFIG . DS . 'queries.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
