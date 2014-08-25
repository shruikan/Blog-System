<?php

//error_reporting(0);

$dir = $_SERVER['DOCUMENT_ROOT'] . 'admin/';

# Constants
define('DIR', $dir);
require(DIR . 'config/constants.php');

# Database Connection
require(DIR . D_CONFIG . '/connection.php');

# Functions
require(DIR . D_FUNCTIONS . '/data.php');

# Page
$page = isset($_GET['p']) ? $_GET['p'] : 'posts';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

# Site Settings
$settings = get_settings($dbc);
$site_title = $settings['site-title'];
$site_url = $settings['site-url'];
$debug_status = $settings['debug-status'];

define('LINK', DIR . D_CONFIG . '/connection.php');
define('ROOT', $site_url);

# Queries
require(DIR . D_CONFIG . '/queries.php');