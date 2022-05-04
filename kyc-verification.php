<?php
session_start();
$title = "KYC Verification";
require 'config/config.php';
if($_SESSION['token']==""){
    header('Location:/login');
    die();
}
include 'templates/header.phtml';
include 'templates/kyc-verification.phtml';