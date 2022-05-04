<?php
session_start();
$title = "Bank Transfer";
require 'config/config.php';
if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
$payment_method = $_REQUEST['q'];
include 'templates/header.phtml';
include 'templates/transfer.phtml';