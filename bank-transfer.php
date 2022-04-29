<?php
session_start();
$title = "Bank Transfer";
require 'config/config.php';
if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
include 'templates/header.phtml';
include 'templates/bank.phtml';