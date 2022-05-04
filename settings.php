<?php
session_start();
$title="Settings";
require 'config/config.php';
if($_SESSION['token']==""){
    header('Location:/login');
    die();
}
$user = User::getUserByToken($_SESSION['token']);
include 'templates/header.phtml';
include 'templates/settings.phtml';