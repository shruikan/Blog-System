<?php

// ADMIN PENAEL SETTINGS

//error_reporting(0);

$root = $_SERVER['DOCUMENT_ROOT'] . 'admin/';
//$root = 'localhost/Blog-System.git/trunk/admin/';
# Database Connection
$dbc = mysqli_connect('localhost', 'shruikan', 'pass123', 'shruikan') OR die('Could not connect: ' . mysqli_connect_error());

# Functions
require($root . 'functions/data.php');

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
$debug_status = $settings['debug-status'];
$site_url = $settings['site-url'];


# Constants
require($root . 'config/constants.php');


# Queries
require(D_CONFIG . 'queries.php');