<?php

# Setup
require($_SERVER['DOCUMENT_ROOT'] . 'config' . DIRECTORY_SEPARATOR . 'setup.php');

# Page
$page = isset($_GET['p']) ? $_GET['p'] : 'dashboard';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

# Queries
require(D_CONFIG . DS . 'queries.php');