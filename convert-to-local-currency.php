<?php
session_start();
$title = 'Covert To Local Currency';
require 'config/config.php';
if($_SESSION['token']==""){
    header('Location:/login');
    die();
}


include 'templates/header.phtml';
include 'templates/convert-to-local-currency.phtml';