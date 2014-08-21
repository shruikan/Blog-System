<?php

# Constants
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
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
$site_url = $settings['site-url'];
$debug_status = $settings['debug-status'];
$user = $settings['username'];

# Path
$path = get_path();
$url = $path['call_parts'][0];

if(empty($url) || $url == 'post') {
    $url = 'home';
}