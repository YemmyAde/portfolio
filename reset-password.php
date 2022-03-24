<?php
session_start();
$title = "CEDA | Reset Password";
require 'config/config.php';
// if($_SESSION['id']!=""){
//     header('Location:/dashboard');
//     die();
// }
include 'templates/header.phtml';
include 'templates/reset-password.phtml';
