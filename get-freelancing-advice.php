<?php
session_start();
$title = "Get Freelancing Advice";
require 'config/config.php';

if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
include 'templates/header.phtml';
include 'templates/get-freelancing-advice.phtml';
