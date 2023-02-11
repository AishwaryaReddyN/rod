<?php
require 'vendor/autoload.php';

// Initialise .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Initialse Session
session_status() === PHP_SESSION_ACTIVE ?: session_start();

// Set Base Directory
$absoluteDir = $_SERVER['DOCUMENT_ROOT'] . $_ENV['BASE_DIR'];

// Set Current month for calendar
if (!$_SESSION['currentMonth'])
    $_SESSION['currentMonth'] = 0;