<?php
session_start();
$title = "Dashboard";
require 'config/config.php';
 if($_SESSION['token']==""){
     header('Location:/login');
     die();
 }
 $exchange_rates = CedaExchangeRate::getUserByUserISO($_SESSION['iso']);
include 'templates/header.phtml';
include 'templates/dashboard.phtml';