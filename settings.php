<?php
session_start();
$title="Settings";
require 'config/config.php';
if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
include 'templates/header.phtml';
include 'templates/settings.phtml';