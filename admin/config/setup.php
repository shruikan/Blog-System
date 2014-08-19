<?php

# Constants
include('../config/constants.php');

# Database Connection
include('../' . D_CONFIG . '/connection.php');

# Queries
include(D_CONFIG . '/post.php');


# User Setup
$user = $_SESSION['username'];

# Page Setup
$page = isset($_GET['p']) ? $_GET['p'] : 'dashboard';