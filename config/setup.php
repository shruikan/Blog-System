<?php

//error_reporting(0);
# Constants
require('config/constants.php');

# Database Connection
require(D_CONFIG . '/connection.php');

# Functions
require(D_FUNCTIONS . '/data.php');

# Site Settings
$settings = get_settings($dbc);
$site_title = $settings['site-title'];
$site_url = $settings['site-url'];
$debug_status = $settings['debug-status'];

define('ROOT', $site_url);
//define('ROOT', 'localhost/Blog-System.git/trunk/');
# Navigation
$path = get_path();
$url = $path['call_parts'][0];
require(D_FUNCTIONS . '/navigation.php');

# Queries
require('queries.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $user = get_user($dbc, $username);
}

# Aside Layout Pages
$aside = array('home');