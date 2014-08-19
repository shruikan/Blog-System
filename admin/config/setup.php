<?php

# Constants
require('../config/constants.php');

# Database Connection
require('../' . D_CONFIG . '/connection.php');

# Functions
require(D_FUNCTIONS . '/helpers.php');
require('../' . D_FUNCTIONS . '/data.php');

# User Setup
$user = data_user($dbc, $_SESSION['username']);

# Page Setup
$page = isset($_GET['p']) ? $_GET['p'] : 'dashboard';


# Queries
require(D_CONFIG . '/post.php');
