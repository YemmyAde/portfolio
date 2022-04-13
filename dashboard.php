<?php
session_start();
$title = "Dashboard";
require 'config/config.php';
 if($_SESSION['id']==""){
     header('Location:/login');
     die();
 }
include 'templates/header.phtml';
include 'templates/dashboard.phtml';