<?php

//error_reporting(0);

# Database Connection
$dbc = mysqli_connect('localhost', 'shruikan', 'pass123', 'shruikan')
				OR die('Could not connect: ' . mysqli_connect_error());

$root = $_SERVER['DOCUMENT_ROOT'];

# Data
require($root . 'functions/data.php');

# Site Settings
$settings = get_settings($dbc);
$site_title = $settings['site-title'];
$site_email = $settings['site-email'];
$debug_status = $settings['debug-status'];
$site_url = $settings['site-url'];

# Constants
require($root . 'config/constants.php');
require($root . 'config/queries.php');

# Navigation
$path = get_path();
$url = $path['call_parts'][0];
require($root . 'functions/navigation.php');

# User
$user = get_user($dbc, $_SESSION['username']);

# Aside Layout Pages
$aside = array('home');
