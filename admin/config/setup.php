<?php

//error_reporting(0);
# Constants
require('config/constants.php');

# Database Connection
require(D_CONFIG . '/connection.php');

# Functions
require(D_FUNCTIONS . '/data.php');

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

define('ROOT', $site_url . 'admin/');


# Queries
require(D_CONFIG . '/queries.php');