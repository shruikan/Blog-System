<?php

//error_reporting(0);

# Constants
define('ROOT', ''); // TODO: USE $_SERVER
define('DS', DIRECTORY_SEPARATOR);
require(ROOT . 'config' . DS . 'constants.php');

# Database Connection
require(ROOT . D_CONFIG . DS .'connection.php');

# Functions
require(ROOT . D_FUNCTIONS . DS . 'data.php');
require(ROOT . D_FUNCTIONS . DS . 'navigation.php');

# Site Settings
$settings = get_settings($dbc);
$site_title = $settings['site-title'];
$site_url = '/'; // User DB URL
$debug_status = $settings['debug-status'];

# Path
$path = get_path();
$url = $path['call_parts'][0];

if(empty($url) || $url == 'post') {
    $url = 'home';
}