<?php
session_start();
$title = "CEDA | Micro Business";
require 'config/config.php';
// if($_SESSION['id']!=""){
//     header('Location:/dashboard');
//     die();
// }
include 'templates/header.phtml';
include 'templates/micro-business.phtml';
