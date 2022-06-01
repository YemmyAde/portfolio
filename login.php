<?php
session_start();
$title = "CEDA | Login";
require 'config/config.php';

if (isset($_SESSION['id'])):
    header('location: dashboard');
    die();
endif;
include 'templates/header.phtml';
include 'templates/login.phtml';
